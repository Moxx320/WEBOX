<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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
        return view('reservas.create');
    }

    public function store(Request $request)
{
    $user = Auth::user();
    $username = $user->username;
    $request->validate([
        'tiempo_tolerancia' => 'required',
        'cancelacion' => 'required|boolean',
        'inicio_apartado' => 'required',
        'fin_apartado' => 'required',
        'fecha' => 'required',
    ]);

    Reserva::create([
        'nombre_usuario' => $username,
        'tiempo_tolerancia' => $request->tiempo_tolerancia,
        'cancelacion' => $request->cancelacion,
        'inicio_apartado' => $request->inicio_apartado,
        'fin_apartado' => $request->fin_apartado,
        'fecha' => $request->fecha,
    ]);

    return redirect()->route('reservas.index')->with('success', 'Apartado creado correctamente.');
}

public function update(Request $request, Reserva $reserva)
{
    $user = Auth::user();
    $username = $user->username;
    $request->validate([
        'tiempo_tolerancia' => 'required',
        'cancelacion' => 'required|boolean',
        'inicio_apartado' => 'required',
        'fin_apartado' => 'required',
        'fecha' => 'required',
    ]);

    $reserva->update([
        'usuario_id' => $username,
        'tiempo_tolerancia' => $request->tiempo_tolerancia,
        'cancelacion' => $request->cancelacion,
        'inicio_apartado' => $request->inicio_apartado,
        'fin_apartado' => $request->fin_apartado,
        'fecha' => $request->fecha,
    ]);

    return redirect()->route('reservas.index')->with('success', 'Apartado actualizado correctamente.');
}

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index')->with('success', 'Apartado eliminado correctamente.');
    }
}