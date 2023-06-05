@extends('layouts.main', ['activePage' => 'profile', 'titlePage' => 'Detalles del usuario'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Editar perfil</h4>
                            <p class="card-category">Actualiza la información de tu perfil</p>
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

                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating text-primary font-weight-bold">Nombre</label>
                                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating text-primary font-weight-bold">Nombre de usuario</label>
                                            <input type="text" class="form-control" name="username" value="{{ $user->username }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating text-primary font-weight-bold">Correo electrónico</label>
                                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="bmd-label-floating text-primary font-weight-bold">Cambiar Contraseña (Opcional)</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <a href="{{ route('profile.index') }}" class="btn btn-primary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Guardar cambios</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card card-profile">
                            <div class="card-avatar">
                                <a href = '#mox'>
                                    <img class="img" src="img/default-avatar.png">
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <h6 class="card-category">{{ $user->username }}</h6>
                            <h4 class="card-title">{{ $user->name }}</h4>
                            <h5 class="card-email">{{ $user->email }}</h5>
                            <p class="card-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection