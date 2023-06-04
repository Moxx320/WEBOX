<?php

namespace App\Http\Controllers;


use App\Models\Equipo;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservas = Reserva::where('usuario_id', $user->id)->get();
        return view('equipos.index', compact('reservas'));
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
    // Otros métodos del controlador
}
