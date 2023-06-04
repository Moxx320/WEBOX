@extends('layouts.main', ['activePage' => 'profile', 'titlePage' => 'Detalles del usuario'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Mi Perfil</h4>
                            <p class="card-category">Vista detallada del usuario {{ $user->name }}</p>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating text-primary font-weight-bold">Nombre</label>
                                        <div class="form-control bg-gray">{{ $user->name }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating text-primary font-weight-bold">Nombre de usuario</label>
                                        <div class="form-control bg-gray">{{ $user->username }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating text-primary font-weight-bold">Correo electrónico</label>
                                        <div class="form-control bg-gray">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating text-primary font-weight-bold">Fecha de creación</label>
                                        <div class="form-control bg-gray">{{ $user->created_at }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Editar perfil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection