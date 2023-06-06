@extends('layouts.main', ['activePage' => 'historial', 'titlePage' => 'Seccion de Reservas'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Reservaciones de Hoy</h4>
                        <p class="card-category">Consulta las reservaciones activas del dia de hoy</p>
                    </div>
                    <div class="card-body">
                        @if($reservas->isEmpty())
                            <p>No hay horarios disponibles para este equipo.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Equipo</th>
                                        <th>Usuario que apartó</th>
                                        <th>Fecha que apartó</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservas as $reserva)
                                        <tr>
                                            <td>{{ $reserva->equipo->nombre }}</td>
                                            <td>{{ $reserva->username }}</td>
                                            <td>{{ $reserva->fecha }}</td>
                                            <td>{{ $reserva->hora_inicio }}</td>
                                            <td>{{ $reserva->hora_fin }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection