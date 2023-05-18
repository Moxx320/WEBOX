@extends('layouts.main', ['activePage' => 'reservas', 'titlePage' => 'Seccion de Reservas'])
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
             <!-- resources/views/reservas/index.blade.php -->

<h1 class="text-center"><b>Lista de Reservas</b></h1>

<p align="right"><a href="{{ route('reservas.create') }}"><button type="button" class="btn btn-success">Crear Reserva</button></a></p>


@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table class="table table-success">
    <thead>
        <tr>
            <th>Folio</th>
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
                <a href="{{ route('reservas.edit', $reserva->folio) }}"><button type="button" class="btn btn-info">Editar</button></a>
                <form action="{{ route('reservas.destroy', $reserva->folio) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection