<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistorialController;
use Illuminate\Support\Facades\Auth;

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
    $user = Auth::user();
    if(!$user){
    return view('auth/login');
    }
    else{
        return view('home');
    }
});
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
    

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    
    Route::get('/historial', [App\Http\Controllers\HistorialController::class, 'index'])->name('historial.index');
    Route::get('/historial/reordenar', [HistorialController::class, 'reordenar'])->name('historial.reordenar');
    Route::get('/historial/hoy', [App\Http\Controllers\HistorialController::class, 'filtro'])->name('historial.filtro');
    
    Route::get('/reservas/create', [App\Http\Controllers\ReservaController::class, 'create'])->name('reservas.create');
    Route::delete('/reservas/{reserva}', [App\Http\Controllers\ReservaController::class, 'destroy'])->name('reservas.destroy');
    Route::post('/reservas', [App\Http\Controllers\ReservaController::class,'store'])->name('reservas.store');
    Route::get('/reservas/{reserva}', [App\Http\Controllers\ReservaController::class, 'show'])->name('reserva.show');
    Route::get('/reservas', [App\Http\Controllers\ReservaController::class, 'index'])->name('reserva.index');
    Route::post('/reservas/validar', [App\Http\Controllers\ReservaController::class, 'validar'])->name('reservas.validar');

    Route::get('/horarios', [App\Http\Controllers\HorariosDisponiblesController::class, 'index'])->name('horarios.index');

    
    Route::get('/my', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::put('/my/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');