@extends('layouts.main', ['activePage' => 'reservas', 'titlePage' => 'Seccion de Reservas'])

@section('content')
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-success">
                    <h4 class="card-title">Lista de Apartados</h4>
                    <p class="card-category">Equipos apartados</p>
                  </div>
                  <div class="card-body">
             <!-- resources/views/reservas/index.blade.php -->

<p align="right"><a href="{{ route('reservas.create') }}"><button type="button" class="btn btn-success">Apartar Equipo</button></a></p>



@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<div class="table-responsive">
<table class="table">
<thead class="text-primary">
<thead>
                                <tr>
                                    <th>Reserva ID</th>
                                    <th>Equipo</th>
                                    <th>Fecha</th>
                                    <th>Hora Inicio</th>
                                    <th>Hora Fin</th>
                                    <th>Tiempo de Tolerancia</th>
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
                                    <td>{{ $reserva->tiempo_tolerancia }}</td>
            <td>
            <form action="{{ route('reserva.show', $reserva->id) }}" method="get">
                        <button type="submit" rel="tooltip" class="btn btn-warning">
                          <i class="material-icons">remove_red_eye</i>
                        </button>
                </form>
                <form action="{{ route('reservas.destroy', $reserva->id) }}" method="post"
                        onsubmit="return confirm('¿Desea cancelar su apartado?')" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn btn-danger">
                          <i class="material-icons">close</i>
                        </button>
                      </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2">No hay apartados actualmente.</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection