@extends('layouts.main', ['activePage' => 'reservas', 'titlePage' => 'Seccion de Reservas'])
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
             <!-- resources/views/reservas/index.blade.php -->

<h1>Lista de Reservas</h1>

<a href="{{ route('reservas.create') }}">Crear Reserva</a>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>Folio</th>
            <th></th>
            <th>Cancelación</th>
            <th>Inicio Apartado</th>
            <th>Fin Apartado</th>
            <th>Fecha</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservas as $reserva)
        <tr>
            <td>{{ $reserva->folio }}</td>
            <td>{{ $reserva->tiempo_tolerancia }}</td>
            <td>{{ $reserva->cancelacion ? 'Sí' : 'No' }}</td>
            <td>{{ $reserva->inicio_apartado }}</td>
            <td>{{ $reserva->fin_apartado }}</td>
            <td>{{ $reserva->fecha }}</td>
            <td>{{ $reserva->estatus }}</td>
            <td>
                <a href="{{ route('reservas.edit', $reserva->folio) }}">Editar</a>
                <form action="{{ route('reservas.destroy', $reserva->folio) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection