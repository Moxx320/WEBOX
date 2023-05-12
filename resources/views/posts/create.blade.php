@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Nuevo Post'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('posts.store') }}" class="form-horizontal">
          @csrf
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Lista de Equipos</h4>
              <p class="card-category">Ingresar Nuevo Equipo</p>
            </div>
            <!--End header--> 
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="title" class="col-sm-2 col-form-label">EQUIPOS</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="title" placeholder="Ingrese el nombre del equipo"
                    autocomplete="off" autofocus>
                </div>
              </div>
            </div>

            <!--End body-->

            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection