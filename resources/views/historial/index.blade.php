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
                                                <th>Folio</th>
                                                <th>Usuario que apartó</th>
                                                <th>Inicio de Apartado</th>
                                                <th>Fin de Apartado</th>
                                                <th>Fecha</th>
                                                <th>Cancelación</th>
                                                <th>Estatus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($reservas as $reserva)
                                            <tr>
                                                <td>{{ $reserva->folio }}</td>
                                                <td>{{ $reserva->username }}</td>
                                                <td>{{ $reserva->inicio_apartado }}</td>
                                                <td>{{ $reserva->fin_apartado }}</td>
                                                <td>{{ $reserva->fecha }}</td>
                                                <td>{{ $reserva->cancelacion ? 'Sí' : 'No' }}</td>
                                                <td>{{ $reserva->estatus }}</td>
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