<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::all();

        return view('equipos.index', compact('equipos'));
    }

    /**
     * Aparta un equipo específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function apartar($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->apartado = true;
        $equipo->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo apartado exitosamente.');
    }
}

