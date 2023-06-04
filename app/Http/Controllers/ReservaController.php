<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Equipo;
use Auth;

class ReservaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservas = Reserva::where('username', $user->username)->get();
        return view('reservas.index', compact('reservas'));
    }
    public function create()
    {
        $user = Auth::user();
        $reservaExistente = Reserva::where('username', $user->username)->first();
        if ($reservaExistente) {
        return redirect()->back()->with('success', 'Actualmente tienes una reserva activa');
}
        // Lógica para mostrar el formulario de creación de reserva
        $equipos = Equipo::all();

        if ($equipos->isEmpty()) {
            // Manejo de la situación si no hay equipos disponibles
        }

        return view('reservas.create', compact('equipos'));
    }
        
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'equipo_id' => 'required',
            'fecha' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);
        
        $tolerancia = date('H:i', strtotime($data['hora_inicio'] . '+5 minutes'));
        
        $reserva = new Reserva(); // Crear instancia del modelo Reserva
        $reserva->equipo_id = $data['equipo_id'];
        $reserva->fecha = $data['fecha'];
        $reserva->hora_inicio = $data['hora_inicio'];
        $reserva->hora_fin = $data['hora_fin'];
        $reserva->tiempo_tolerancia = $tolerancia;
        $reserva->username = Auth::user()->username;


        // Guardar la reserva en la base de datos
        $reserva->save();

        // Obtener el ID de la reserva recién creada
        $reservaId = $reserva->id;

        // Redirigir al usuario a la vista de detalles de la reserva
        return redirect()->route('reserva.show', $reservaId);
        // Resto de tu código...

        return redirect()->back()->with('success', 'Reserva creada correctamente');
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

        // Eliminar la reserva
        $reserva->delete();

        // Resto de tu código...
        return redirect()->route('reserva.index')->with('success', 'Reserva cancelada correctamente');
    }
}
