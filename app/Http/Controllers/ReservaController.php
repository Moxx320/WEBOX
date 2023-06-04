<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Equipo;
use Auth;

class ReservaController extends Controller
{
    public function create()
    {
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

        $reserva = new Reserva(); // Crear instancia del modelo Reserva
        $reserva->equipo_id = $data['equipo_id'];
        $reserva->fecha = $data['fecha'];
        $reserva->hora_inicio = $data['hora_inicio'];
        $reserva->hora_fin = $data['hora_fin'];
        $reserva->usuario_id = Auth::user()->id;

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
        if (Auth::user()->id !== $reserva->usuario_id) {
            return redirect()->back()->with('error', 'No tienes permiso para cancelar esta reserva');
        }

        // Eliminar la reserva
        $reserva->delete();

        // Resto de tu código...

        return redirect()->back()->with('success', 'Reserva cancelada correctamente');
    }


}
