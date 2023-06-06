@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => 'Detalles del rol'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-13">
        <div class="card">
          <!--Header-->
          <div class="card-header card-header-success">
            <h4 class="card-title">Roles</h4>
            <p class="card-category">Detalles del rol Administrador</p>
          </div>
          <!--End header-->
          <!--Body-->
          <div class="card-body">
            <div class="row">
              <!-- first -->
              <div class="col-md-12">
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
                          <h5 class="title mt-3">Permisos de: Administrador</h5>
                        </a>
                        <p class="description">
                          {{ ('Fecha de creacion') }}
                          <br>
                          {{ $role->created_at }}
                          <br>
                        </p>
                      </div>
                    </p>
                    <div class="card-description">
                      @forelse ($role->permissions as $permission)
                          <span class="badge rounded-pill bg-dark text-white">{{ $permission->name }}</span>
                      @empty
                          <span class="badge badge-danger bg-danger">Sin Permisos</span>
                      @endforelse
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