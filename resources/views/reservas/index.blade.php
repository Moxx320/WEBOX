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
            <th>Folio</th>
            <th>Tiempo de Tolerancia</th>
            <th>Inicio de Apartado</th>
            <th>Fin de Apartado</th>
            <th>Fecha</th>
            <th>Cancelacion</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($reservas as $reserva)
        <tr>
            <td>{{ $reserva->folio }}</td>
            <td>{{ $reserva->tiempo_tolerancia }}</td>
            <td>{{ $reserva->inicio_apartado }}</td>
            <td>{{ $reserva->fin_apartado }}</td>
            <td>{{ $reserva->fecha }}</td>
            <td>{{ $reserva->cancelacion ? 'Sí' : 'No' }}</td>            
            <td>{{ $reserva->estatus }}</td>
            <td>
                <a href="{{ route('reservas.edit', $reserva->folio) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                <form action="{{ route('reservas.destroy', $reserva->folio) }}" method="post"
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