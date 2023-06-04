@extends('layouts.main', ['activePage' => 'reservas', 'titlePage' => 'Seccion de Reservas'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Horarios Reservados</h4>
                        <p class="card-category">Consulta los horarios ya ocupados de cada equipo</p>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="horariosAccordion">
                            @foreach($equipos as $equipo)
                            <div class="card">
                                <div class="card-header" id="heading{{ $equipo->id }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $equipo->id }}" aria-expanded="true" aria-controls="collapse{{ $equipo->id }}">
                                            {{ $equipo->nombre }}
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse{{ $equipo->id }}" class="collapse" aria-labelledby="heading{{ $equipo->id }}" data-parent="#horariosAccordion">
                                    <div class="card-body">
                                        @if($equipo->reservas->isEmpty())
                                            <p>No hay horarios disponibles para este equipo.</p>
                                        @else
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Fecha</th>
                                                        <th>Hora Inicio</th>
                                                        <th>Hora Fin</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($equipo->reservas as $reserva)
                                                        @if(!$reserva->cancelacion)
                                                            <tr>
                                                                <td>{{ $reserva->fecha }}</td>
                                                                <td>{{ $reserva->hora_inicio }}</td>
                                                                <td>{{ $reserva->hora_fin }}</td>
                                                            </tr>
                                                        @endif
                                                    @empty
                                                        <tr>
                                                            <td colspan="3">No hay apartados activos actualmente.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if($equipos->isEmpty())
                            <p>Actualmente no hay horarios reservados.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection