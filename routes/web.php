<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});
   

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['middleware' => 'auth'], function() {
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');

    Route::resource('posts', App\Http\Controllers\PostController::class);

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);

    Route::get('/reservas', [App\Http\Controllers\ReservaController::class, 'index'])->name('reservas.index');
    Route::get('/reservas/create', [App\Http\Controllers\ReservaController::class, 'create'])->name('reservas.create');
    Route::post('/reservas', [App\Http\Controllers\ReservaController::class, 'store'])->name('reservas.store');
    Route::get('/reservas/{reserva}/edit', [App\Http\Controllers\ReservaController::class, 'edit'])->name('reservas.edit');
    Route::put('/reservas/{reserva}', [App\Http\Controllers\ReservaController::class, 'update'])->name('reservas.update');
    Route::delete('/reservas/{reserva}', [App\Http\Controllers\ReservaController::class, 'destroy'])->name('reservas.destroy');
    
    Route::get('/historial', [App\Http\Controllers\HistorialController::class, 'index'])->name('historial.index');
    
    Route::get('/equipos', [App\Http\Controllers\EquipoController::class, 'index'])->name('equipos.index');
    Route::get('/equipos/{id}/apartar', [App\Http\Controllers\EquipoController::class, 'apartar'])->name('equipos.apartar');

});