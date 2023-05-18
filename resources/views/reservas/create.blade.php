@extends('layouts.main', ['activePage' => 'reservas', 'titlePage' => 'Seccion de de Reservas'])
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
             <!-- resources/views/reservas/create.blade.php -->

<h1 class="text-center">Crear Reserva</h1>
<br>


<form action="{{ route('reservas.store') }}" method="POST">
    @csrf

    <label for="tiempo_tolerancia">Tiempo Tolerancia:</label>
    <input type="time" id="tiempo_tolerancia" name="tiempo_tolerancia" required>

    <label for="inicio_apartado">Inicio Apartado:</label>
    <input type="time" id="inicio_apartado" name="inicio_apartado" required>

    <label for="fin_apartado">Fin Apartado:</label>
    <input type="time" id="fin_apartado" name="fin_apartado" required>

    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha" required>

    <label for="cancelacion">Cancelación:</label>
        <select id="cancelacion" name="cancelacion" required>
            <option value="0">No</option>
            <option value="1">Sí</option>
        </select>
    <br>
    <p align="right"><button type="submit" class="btn btn-success">Guardar</button></p>
    <p align="right"><a href="{{ route('reservas.index') }}"><button type="button" class="btn btn-warning">Volver</button></a></p>
</form>

       

@endsection