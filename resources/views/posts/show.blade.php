@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Detalles de los equipos'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <!--Header-->
          <div class="card-header card-header-success">
            <h4 class="card-title">Asignacion de Equipos</h4>
            <p class="card-category">Vista detallada de {{ $post->title }}</p>
          </div>
          <!--End header-->
          <!--Body-->
          <div class="card-body">
            <div class="row">
              <!-- first -->
              <div class="col-md-4">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                      <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="#">
                          <img class="avatar" src="{{ asset('/img/default-avatar.png') }}" alt="">
                          <h5 class="title mt-3">{{ $post->title }}</h5>
                        </a>
                        <p class="description">
                          {{ ('Asignacion') }} <br>
                          {{ $post->title }} <br>
                          {{ $post->created_at }}
                        </p>
                      </div>
                    </p>
                    <div class="card-description">
                      {{ ('Equipo de computo asignado para su uso en el laboratorio de Computo del instituto Tecnologico Superior de Lerdo') }}
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                      <button type="submit" class="btn btn-sm btn-primary">Editar</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--end first-->
            </div>
            <!--end row-->
          </div>
          <!--End card body-->
        </div>
        <!--End card-->
      </div>
    </div>
  </div>
</div>
@endsection