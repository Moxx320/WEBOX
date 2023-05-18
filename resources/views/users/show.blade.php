@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Detalles del usuario'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <div class="card-title">Usuarios</div>
            <p class="card-category">Vista detallada del usuario {{ $user->name }}</p>
          </div>
          <!--body-->
          <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" role="success">
              {{ session('success') }}
            </div>
            @endif

              <div class="col-md-15">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                      <div class="author">
                        <a href="#" class="d-flex">
                          <img src="{{ asset('/img/default-avatar.png') }}" alt="image" class="avatar">
                          <h5 class="title mx-3">{{ $user->name }}</h5>
                        </a>
                        <p class="description">
                          {{ $user->username }} <br>
                          {{ $user->email }} <br>
                          {{ $user->created_at }}
                        </p>
                      </div>
                    </p>
                    <div class="card-description">
                      Dentro de este campo se registra fecha de creacion del usuario
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                      <a href="{{ route('users.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                      <button class="btn btn-sm btn-primary">Editar</button>
                    </div>
                  </div>
                </div>
              </div><!--end card user 2-->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
