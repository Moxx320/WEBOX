<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use App\Models\Equipo;

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
public function filtro()
{
    $filtroFecha = Carbon::now('America/Mexico_City')->format('Y-m-d');

    $reservas = Reserva::query()
        ->where('cancelacion', false)
        ->whereDate('fecha', '=', $filtroFecha)
        ->get();
    

    return view('historial.filtro', compact('reservas'));
}
public function filtros(Request $request)
{
    $filtroId = $request->input('id');
    $filtroUsuario = $request->input('username');
    $filtroFecha = $request->input('fecha');
    $filtroEquipo = $request->input('equipo');

    $reservas = Reserva::query();

    if ($filtroId) {
        $reservas->where('id', 'LIKE', '%' . $filtroId . '%');
    }

    if ($filtroUsuario) {
        $reservas->where('username', 'LIKE', '%' . $filtroUsuario . '%');
    }

    if ($filtroFecha) {
        $reservas->whereDate('fecha', '=', $filtroFecha);
    }

    if ($filtroEquipo) {
        $reservas->whereHas('equipo', function ($query) use ($filtroEquipo) {
            $query->where('nombre', 'LIKE', '%' . $filtroEquipo . '%');
        });
    }

    $reservas = $reservas->paginate(10);
    $sort = $request->input('sort', 'id');
    $direction = $request->input('direction', 'asc');

    return view('historial.index', compact('reservas', 'sort', 'direction'));
}
}