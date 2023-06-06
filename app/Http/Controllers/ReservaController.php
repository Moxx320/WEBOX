<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Equipo;
use Carbon\Carbon;
use Auth;

class ReservaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservas = Reserva::where('username', $user->username)->get();
        $reservasActivas = $reservas->where('cancelacion', 0);
        return view('reservas.index', compact('reservasActivas'));
    }

    public function create()
    {
        $user = Auth::user();
    
        // Verificar si el usuario tiene reservas canceladas
        $reservasCanceladas = Reserva::where('username', $user->username)
            ->where('cancelacion', 1)
            ->get();
    
        // Verificar si el usuario tiene alguna reserva activa
        $reservaActiva = Reserva::where('username', $user->username)
            ->where('cancelacion', 0)
            ->first();
    
        if ($reservaActiva) {
            // El usuario tiene una reserva activa, no permitir crear una nueva reserva
            return redirect()->back()->withErrors(['error' => 'Actualmente ya tienes una reserva activa']);
        }
    
        // El usuario no tiene reservas canceladas ni reservas activas, permitir crear una nueva reserva
        $horarios = $this->getHorariosDisponibles();
        $equipos = Equipo::all();
    
        return view('reservas.create', compact('equipos', 'horarios'));
    }
        
    private function checkReservaDisponibilidad(Request $request)
    {
        $equipoId = $request->input('equipo_id');
        $fecha = $request->input('fecha');
        $horaInicio = $request->input('hora_inicio');
        $horaFin = $request->input('hora_fin');
    
        $reservasExistente = Reserva::where('equipo_id', $equipoId)
            ->where('fecha', $fecha)
            ->where('cancelacion', false)
            ->where(function ($query) use ($horaInicio, $horaFin) {
                $query->where(function ($query) use ($horaInicio, $horaFin) {
                    $query->where(function ($query) use ($horaInicio, $horaFin) {
                        $query->where('hora_inicio', '>=', $horaInicio)
                            ->where('hora_inicio', '<', $horaFin);
                    })
                    ->orWhere(function ($query) use ($horaInicio, $horaFin) {
                        $query->where('hora_fin', '>', $horaInicio)
                            ->where('hora_fin', '<=', $horaFin);
                    })
                    ->orWhere(function ($query) use ($horaInicio, $horaFin) {
                        $query->where('hora_inicio', '<=', $horaInicio)
                            ->where('hora_fin', '>=', $horaFin);
                    });
                });
            })
            ->get();
    
        if ($reservasExistente->isNotEmpty()) {
            return false; // Existe una reserva que se superpone
        }
    
        return true; // No hay reservas que se superpongan
    }

    public function store(Request $request)
    {
    // Verificar la disponibilidad de la reserva
    $disponibilidad = $this->checkReservaDisponibilidad($request);

        if (!$disponibilidad) {
            $mensajeError = 'El horario de reserva se interpone con otra reserva existente. Por favor, elija un horario diferente. Consulte los equipos reservados <a href="' . route('horarios.index') . '"><strong><u>AQUÍ</u></strong></a>.';
            return redirect()->back()->with(['error' => $mensajeError]);
        }

        // Validar la duración de la reserva (máximo 2 horas)
        $horaInicio = Carbon::parse($request->input('hora_inicio'));
        $horaFin = Carbon::parse($request->input('hora_fin'));
        $duracionReserva = $horaInicio->diffInMinutes($horaFin);

        if ($duracionReserva > 120) {
            return redirect()->back()->withErrors(['error' => 'La duración máxima permitida para una reserva es de 2 horas']);
        }

    $fechaActual = Carbon::now('America/Mexico_City')->format('Y-m-d');
    $horaActual = Carbon::now('America/Mexico_City')->subHour()->format('H:i');
    $data = $request->validate([
        'equipo_id' => 'required',
        'fecha' => "required|date|after_or_equal:$fechaActual",
        'hora_inicio' => "required",
        'hora_fin' => 'required',
    ], [
        'fecha.after_or_equal' => 'No puedes hacer una reserva para una fecha anterior a la fecha actual (' . date('d/m/Y') . ')',
    ]);

    $fechaReserva = $data['fecha'];
    // Verificar si la fecha de reserva es igual a la fecha actual
        $horaInicio = Carbon::createFromFormat('H:i', $data['hora_inicio']);
        $horaFin = Carbon::createFromFormat('H:i', $data['hora_fin']);
        $duracionReserva = $horaFin->diffInMinutes($horaInicio);

        if ($duracionReserva < 15) {
            return redirect()->back()->withErrors(['error' => 'La reserva debe tener una duración mínima de 15 minutos']);
        }    
        if ($fechaReserva == $fechaActual) {
        if ($data['hora_inicio'] < $horaActual) {
            return redirect()->back()->withErrors(['error' => 'No puedes hacer una reserva para una hora anterior a la hora actual']);
        }
    }
        
        $tolerancia = Carbon::parse($data['hora_inicio'])->addMinutes(5);
        
        $reserva = new Reserva(); // Crear instancia del modelo Reserva
        $reserva->equipo_id = $data['equipo_id'];
        $reserva->fecha = $data['fecha'];
        $reserva->hora_inicio = $data['hora_inicio'];
        $reserva->hora_fin = $data['hora_fin'];
        $reserva->tiempo_tolerancia = $tolerancia;
        $reserva->username = Auth::user()->username;
        $reserva->cancelacion = 0; // Establecer la cancelación a 0 (no cancelada)


        // Guardar la reserva en la base de datos
        $reserva->save();

        // Obtener el ID de la reserva recién creada
        $reservaId = $reserva->id;

        return redirect()->route('reserva.index')->with('success', 'Reserva creada correctamente');
    }
    
    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }


    public function destroy(Reserva $reserva)
    {
    // Validar que el usuario autenticado sea el propietario de la reserva
    if (Auth::user()->username !== $reserva->username) {
        return redirect()->back()->with('error', 'No tienes permiso para cancelar esta reserva');
    }

    // Cancelar la reserva estableciendo el valor de cancelacion en 1
    $reserva->cancelacion = 1;
    $reserva->save();

    // Resto de tu código...
    return redirect()->route('reserva.index')->with('success', 'Reserva cancelada correctamente');
    }

    private function getHorariosDisponibles()
    {
        $horarios = [];
        
        // Definir el horario de apertura y cierre
        $horaApertura = strtotime('08:00');
        $horaCierre = strtotime('23:45');
        
        // Calcular los intervalos de 15 minutos dentro del horario
        $horaActual = $horaApertura;
        while ($horaActual <= $horaCierre) {
            $horarios[] = date('H:i', $horaActual);
            $horaActual += (15 * 60); // Sumar 15 minutos
        }
        
        return $horarios;
    }
}
