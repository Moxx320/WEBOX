@extends('layouts.main', ['activePage' => 'equipos', 'titlePage' => 'Seccion de Equipos'])

@section('content')
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-success">
                    <h4 class="card-title">Lista de Apartados</h4>
                    <p class="card-category">Equipos Disponibles</p>
                  </div>
                  <div class="card-body">
                    @if(session('success'))
                    <div>{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                        <thead class="text-primary">
                            <thead>
    
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Disponible</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->disponible ? 'Sí' : 'No' }}</td>
                    <td>
                        @if ($equipo->disponible)
                        <a href="{{ route('reservas.create', $equipo->id) }}" class="btn btn-sm btn-facebook">Reservar</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
