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
                    <h4 class="card-title">Editar Apartado</h4>
                    <p class="card-category">Reagendar</p>
                  </div>
                  <div class="card-body">
             <!-- resources/views/reservas/edit.blade.php -->
<form action="{{ route('reservas.update', $reserva->folio) }}" method="POST">
    @csrf
    @method('PUT')
<div class="table-responsive">
<table class="table">
<thead class="text-primary">
<thead>
    <tr>
    <th for="tiempo_tolerancia">Tiempo Tolerancia:</th>
    <th for="inicio_apartado">Inicio Apartado:</th>
    <th for="fin_apartado">Fin Apartado:</th>
    <th for="fecha">Fecha:</th>
    <th for="cancelacion">Cancelación:</th>
    <tr>
    </thead>
    <tbody>
    <tr>
    <td><input type="time" id="tiempo_tolerancia" name="tiempo_tolerancia" required></td>
    <td><input type="time" id="inicio_apartado" name="inicio_apartado" required></td>
    <td><input type="time" id="fin_apartado" name="fin_apartado" required></td>
    <td><input type="date" id="fecha" name="fecha" required></td>

    <td><select id="cancelacion" name="cancelacion" required>
        <option value="0">No</option>
        <option value="1">Sí</option>
    </select></td>
</form>
</tr>
</div>
</tbody>
</table>
</div>
                  <div class="card-footer mr-auto">
                    <p><button id=boton_guardar type="submit" class="btn btn-success">Guardar</button></p>
                    <p><a href="{{ route('reservas.index') }}"><button id=boton_volver type="button" class="btn btn-warning">Volver</button></a></p>
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