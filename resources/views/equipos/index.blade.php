@extends('layouts.main', ['activePage' => 'equipos', 'titlePage' => 'Seccion de equipos'])

@section('content')
<h1>Lista de Equipos</h1>

@foreach ($equipos as $equipo)
    <div>
        <span>{{ $equipo->nombre }}</span>
        @if ($equipo->apartado)
            <span class="text-success">(Apartado)</span>
        @else
            <a href="{{ route('equipos.apartar', $equipo->id) }}" class="btn btn-primary">Apartar</a>
        @endif
    </div>
@endforeach

@endsection