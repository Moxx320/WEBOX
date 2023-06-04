@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Reserva</h1>

        <form action="{{ route('reservas.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="equipo_id">Equipo:</label>
                <select name="equipo_id" id="equipo_id" class="form-control">
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hora_inicio">Hora de inicio:</label>
                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hora_fin">Hora de fin:</label>
                <input type="time" name="hora_fin" id="hora_fin" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Crear Reserva</button>
        </form>
    </div>
@endsection
