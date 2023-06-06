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
                    <h4 class="card-title">Reservaciones</h4>
                    <p class="card-category">Tu Reserva Activa</p>
                  </div>
                  <div class="card-body">

<p align="right"><a href="{{ route('horarios.index') }}"><button type="button" class="btn btn-info">Consulta los Horarios Reservados</button></a>
<a href="{{ route('reservas.create') }}"><button type="button" class="btn btn-success">Reservar Equipo</button></a></p>
                  @if ($errors->any())
                              <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                              </div>
                            @endif


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
                                    <th>Tiempo de Tolerancia</th>
                                    <th>Hora Fin</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($reservasActivas as $reserva)
                                <tr>
                                    <td>{{ $reserva->id }}</td>
                                    <td>{{ $reserva->equipo->nombre }}</td>
                                    <td>{{ $reserva->fecha }}</td>
                                    <td>{{ $reserva->hora_inicio }}</td>
                                    <td>{{ $reserva->tiempo_tolerancia }}</td>
                                    <td>{{ $reserva->hora_fin }}</td>
            <td>
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
            <td colspan="2">No hay apartados activos actualmente.</td>
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