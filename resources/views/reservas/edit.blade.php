@extends('layouts.main', ['activePage' => 'reservas', 'titlePage' => 'Seccion de Reservas'])
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
             <!-- resources/views/reservas/edit.blade.php -->

<h1>Editar Reserva</h1>

<form action="{{ route('reservas.update', $reserva->folio) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="tiempo_tolerancia">Tiempo Tolerancia:</label>
    <input type="time" id="tiempo_tolerancia" name="tiempo_tolerancia" value="{{ $reserva->tiempo_tolerancia }}" required>

    <label for="cancelacion">Cancelación:</label>
    <select id="cancelacion" name="cancelacion" required>
        <option value="0" {{ $reserva->cancelacion == 0 ? 'selected' : '' }}>No</option>
        <option value="1" {{ $reserva->cancelacion == 1 ? 'selected' : '' }}>Sí</option>
    </select>

    <label for="inicio_apartado">Inicio Apartado:</label>
    <input type="time" id="inicio_apartado" name="inicio_apartado" value="{{ $reserva->inicio_apartado }}" required>

    <label for="fin_apartado">Fin Apartado:</label>
    <input type="time" id="fin_apartado" name="fin_apartado" value="{{ $reserva->fin_apartado }}" required>

    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha" value="{{ $reserva->fecha }}" required>

    <button type="submit">Guardar</button>
</form>

<a href="{{ route('reservas.index') }}">Volver</a>

@endsection