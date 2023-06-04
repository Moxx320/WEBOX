@extends('layouts.main', ['activePage' => 'equipos', 'titlePage' => 'Disponibilidad de Equipos'])

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
                    <p class="card-category">Equipos apartados</p>
                  </div>
                  <div class="card-body">
                    @if(session('success'))
                    <div>{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                        <thead class="text-primary">
                            <thead>
                                <tr>
                                    <th>Reserva ID</th>
                                    <th>Equipo</th>
                                    <th>Fecha</th>
                                    <th>Hora Inicio</th>
                                    <th>Hora Fin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservas as $reserva)
                                <tr>
                                    <td>{{ $reserva->id }}</td>
                                    <td>{{ $reserva->equipo->nombre }}</td>
                                    <td>{{ $reserva->fecha }}</td>
                                    <td>{{ $reserva->hora_inicio }}</td>
                                    <td>{{ $reserva->hora_fin }}</td>
                                    <form action="{{ route('reservas.destroy', $reserva) }}" method="post" 
                                        onsubmit="return confirm('¿Desea cancelar su apartado?')" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" rel="tooltip" class="btn btn-danger">
                                            <i class="material-icons">close</i> Cancelar Reserva</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">No hay apartados actualmente.</td>
                            </tr>
                            @endforeach
                            <!-- Mensaje de exito -->
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <!-- Mensaje de error -->
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer mr-auto">

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection

