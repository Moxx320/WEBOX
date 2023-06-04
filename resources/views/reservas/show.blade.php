@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Reserva</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Equipo: {{ $reserva->equipo->nombre }}</h5>
                <p class="card-text">Fecha: {{ $reserva->fecha }}</p>
                <p class="card-text">Hora de inicio: {{ $reserva->hora_inicio }}</p>
                <p class="card-text">Hora de fin: {{ $reserva->hora_fin }}</p>
                <p class="card-text">Usuario: {{ $reserva->usuario->name }}</p>
                <a href="{{ route('reserva.index') }}" class="btn btn-primary">Volver</a>
            </div>
            <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar Reserva</button>
            </form>            
        </div>
    </div>
@endsection
