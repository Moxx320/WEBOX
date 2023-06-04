<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Gate;

class HistorialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('historial_index'), 403);

        $reservas = Reserva::paginate(10);

        return view('historial.index', compact('reservas'));
    }
}