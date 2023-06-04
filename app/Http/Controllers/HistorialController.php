<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Gate;

class HistorialController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('historial_index'), 403);
    
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'asc');
    
        $reservas = Reserva::orderBy($sort, $direction)->paginate(10);
    
        return view('historial.index', compact('reservas', 'sort', 'direction'));
    }
    public function reordenar(Request $request)
{
    $columna = $request->input('columna');
    $orden = $request->input('orden');

    $reservas = Reserva::query()
        ->orderBy($columna, $orden)
        ->paginate(10);

    return view('historial.index', compact('reservas'));
}
}