<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;


class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        return view('reservas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tiempo_tolerancia' => 'required',
            'cancelacion' => 'required|boolean',
            'inicio_apartado' => 'required',
            'fin_apartado' => 'required',
            'fecha' => 'required',
        ]);

        Reserva::create($request->all());

        return redirect()->route('reservas.index')->with('success', 'Apartado creado correctamente.');
    }

    public function edit(Reserva $reserva)
    {
        return view('reservas.edit', compact('reserva'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'tiempo_tolerancia' => 'required',
            'cancelacion' => 'required|boolean',
            'inicio_apartado' => 'required',
            'fin_apartado' => 'required',
            'fecha' => 'required',
        ]);

        $reserva->update($request->all());

        return redirect()->route('reservas.index')->with('success', 'Apartado actualizado correctamente.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index')->with('success', 'Apartado eliminado correctamente.');
    }
}
