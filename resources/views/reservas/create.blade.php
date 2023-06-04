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
                            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                            @if(session('error'))
                              <div class="alert alert-danger">
                                {!! session('error') !!}
                              </div>
                            @endif
                                    <form action="{{ route('reservas.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="equipo_id">Selecciona un equipo:</label>
                                        <select name="equipo_id" id="equipo_id" class="form-control">
                                            @foreach($equipos as $equipo)
                                                <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha">Fecha:</label>
                                        <input type="date" id="fecha" name="fecha" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hora_inicio">Inicio Apartado:</label>
                                        <select name="hora_inicio" id="hora_inicio" class="form-control">
                                            @foreach($horarios as $hora)
                                                <option value="{{ $hora }}">{{ $hora }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="hora_fin">Fin Apartado:</label>
                                        <select name="hora_fin" id="hora_fin" class="form-control">
                                            @foreach($horarios as $hora)
                                                <option value="{{ $hora }}">{{ $hora }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <p align="right">
                                        <button id='boton_reserva' type="submit" class="btn btn-primary">Crear Reserva</button>
                                    </p>
                                </form>
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
@endsection