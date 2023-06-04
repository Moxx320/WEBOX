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
                                <h4 class="card-title">Historial de Apartados</h4>
                                <p class="card-category">Equipos apartados</p>
                            </div>
                            <div class="card-body">
                                @if(session('success'))
                                <div>{{ session('success') }}</div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>Reserva ID</th>
                                                <th>Equipo</th>
                                                <th>Fecha</th>
                                                <th>Hora Inicio</th>
                                                <th>Hora Fin</th>
                                                <th>Cancelacion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($reservas as $reserva)
                                            <tr>
                                                <td>{{ $reserva->id }}</td>
                                                <td>{{ $reserva->equipo->nombre }}</td>
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