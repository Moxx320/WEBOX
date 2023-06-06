@extends('layouts.main', ['activePage' => 'historial', 'titlePage' => 'Historial de Apartados'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Historial de Reservas</h4>
                                <p class="card-category">Historial de todos los equipos reservados</p>
                            </div>
                            <div class="card-body">                                     
                            <form action="{{ route('historial.filtros') }}" method="GET">
                                <h6>Filtrar por:</h6>
                                    <div class="form-row">
                                        <div class="col-md-2 mb-3">
                                            <label for="username">ID de Reserva:</label>
                                            <input type="text" class="form-control" id="id" name="id" value="{{ request('id') }}">
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="username">Usuario:</label>
                                            <input type="text" class="form-control" id="username" name="username" value="{{ request('username') }}">
                                        </div>
                                        <div  class="col-md-2 mb-3">
                                            <label for="equipo">Equipo:</label>
                                            <input type="text" class="form-control" id="equipo" name="equipo" value="{{ request('equipo') }}">
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="fecha">Fecha:</label>
                                            <input type="text" class="form-control" id="fecha" name="fecha" value="{{ request('fecha') }}">
                                        </div>                            
                                        <p align="left" ><a><button type="submit" class="btn btn-secondary">Filtrar</button></a></p>
                                        <p align="left" class="col-md-2"><a href="{{ route('historial.filtro') }}"><button type="button" class="btn btn-success">Reservaciones de hoy</button></a></p>           
                                        </div>
                                    </form>

    @if(session('success'))
    <div>{{ session('success') }}</div>
    @endif
                                <div class="table-responsive">
                                    <table class="table">
<thead class="text-primary">
    <tr>
        <th>
            <a href="{{ route('historial.index', ['sort' => 'id', 'direction' => $sort === 'id' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                Reserva ID
                @if ($sort === 'id')
                @if ($direction === 'asc')
                <i class="material-icons">arrow_drop_up</i>
            @else
                <i class="material-icons">arrow_drop_down</i>
            @endif
                @endif
            </a>
        </th>
        <th>
            <a href="{{ route('historial.index', ['sort' => 'username', 'direction' => $sort === 'username' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                Usuario que apartó
                @if ($sort === 'username')
                @if ($direction === 'asc')
                <i class="material-icons">arrow_drop_up</i>
            @else
                <i class="material-icons">arrow_drop_down</i>
            @endif
                @endif
            </a>
        </th>
        <th>
    <a href="{{ route('historial.index', ['sort' => 'equipo_id', 'direction' => $sort === 'equipo_id' && $direction === 'asc' ? 'desc' : 'asc']) }}">
        Equipo
        @if ($sort === 'equipo_id')
            @if ($direction === 'asc')
                <i class="material-icons">arrow_drop_up</i>
            @else
                <i class="material-icons">arrow_drop_down</i>
            @endif
        @endif
    </a>
</th>
        <th>
            <a href="{{ route('historial.index', ['sort' => 'fecha', 'direction' => $sort === 'fecha' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                Fecha
                @if ($sort === 'fecha')
                @if ($direction === 'asc')
                <i class="material-icons">arrow_drop_up</i>
            @else
                <i class="material-icons">arrow_drop_down</i>
            @endif
                @endif
            </a>
        </th>
        <th>
            <a href="{{ route('historial.index', ['sort' => 'hora_inicio', 'direction' => $sort === 'hora_inicio' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                Hora Inicio
                @if ($sort === 'hora_inicio')
                @if ($direction === 'asc')
                <i class="material-icons">arrow_drop_up</i>
            @else
                <i class="material-icons">arrow_drop_down</i>
            @endif
                @endif
            </a>
        </th>
        <th>
            <a href="{{ route('historial.index', ['sort' => 'hora_fin', 'direction' => $sort === 'hora_fin' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                Hora Fin
                @if ($sort === 'hora_fin')
                @if ($direction === 'asc')
                <i class="material-icons">arrow_drop_up</i>
            @else
                <i class="material-icons">arrow_drop_down</i>
            @endif
                @endif
            </a>
        </th>
        <th>
            <a href="{{ route('historial.index', ['sort' => 'cancelacion', 'direction' => $sort === 'cancelacion' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                Reserva Finalizada
                @if ($sort === 'cancelacion')
                @if ($direction === 'asc')
                <i class="material-icons">arrow_drop_up</i>
            @else
                <i class="material-icons">arrow_drop_down</i>
            @endif
                @endif
            </a>
        </th>
    </tr>
</thead>
                                        <tbody>
                                            @forelse($reservas as $reserva)
                                            <tr>
                                                <td>{{ $reserva->id }}</td>
                                                <td>{{ $reserva->username }}</td>
                                                <td>{{ $reserva->equipo->id }}</td>
                                                <td>{{ $reserva->fecha }}</td>
                                                <td>{{ $reserva->hora_inicio }}</td>
                                                <td>{{ $reserva->hora_fin }}</td>
                                                <td>{{ $reserva->cancelacion ? 'Sí' : 'No' }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8">No hay apartados actualmente.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-center">
                                    {{ $reservas->links() }}
                                </div>
                            </div>
                            <div class="card-footer mr-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection