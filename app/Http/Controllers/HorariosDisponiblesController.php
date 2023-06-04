<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;

class HorariosDisponiblesController extends Controller
{
    public function index()
    {
        $equipos = Equipo::with('reservas')
            ->whereHas('reservas', function ($query) {
                $query->where('cancelacion', false);
            })
            ->get();

        return view('horarios.index', compact('equipos'));
    }
}