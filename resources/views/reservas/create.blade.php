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
<h4 class="card-title">Crear Reserva</h4>
</div>
<div class="card-body">

        <form action="{{ route('reservas.store') }}" method="POST">
            @csrf
            

            <div class="form-group">
                <label for="equipo_id">Selecciona tu equipo:</label>
                <select name="equipo_id" id="equipo_id" class="form-control">
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

<div class="table-responsive">
<table class="table">
<thead class="text-primary">
<thead>
    <tr>
    <th for="fecha">Fecha:</th>
    <th for="hora_inicio">Inicio Apartado:</th>
    <th for="hora_fin">Fin Apartado:</th>
    <tr>
    </thead>
    <tbody>
    <tr>
    <td><input type="date" id="fecha" name="fecha" required></td>
    <td><input type="time" id="hora_inicio" name="hora_inicio" required></td>
    <td><input type="time" id="hora_fin" name="hora_fin" required></td>
    </tbody>
    </table>
    <p align= "right">
            <button id='boton_reserva' type="submit" class="btn btn-primary">Crear Reserva</button>
        </p>
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
  </div>
@endsection
