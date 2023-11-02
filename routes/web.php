<?php

use App\Models\Convidado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ConvidadoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicial');
});

Route::get('/agendamento', [ReservaController::class, 'create'])->middleware('auth');

Route::get('/reservas', [ReservaController::class, 'index'])->middleware('auth');

Route::post('/reserva', [ReservaController::class, 'store'])->middleware('auth');

Route::get('/reserva/{id}/edit', [ReservaController::class, 'edit'])->middleware('auth');

Route::get('/reserva/{id}/negar', [ReservaController::class, 'negar'])->middleware('auth');

Route::get('/reserva/{id}/aceitar', [ReservaController::class, 'aceitar'])->middleware('auth');

Route::put('/reserva/{id}', [ReservaController::class, 'update'])->middleware('auth');

Route::delete('/reserva/{id}', [ReservaController::class, 'destroy'])->middleware('auth');

Route::get('/reserva/{id}', [ReservaController::class, 'show'])->middleware('auth');


Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/login', [UserController::class, 'authenticate'])->middleware('guest');

Route::get('/cadastro', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


Route::get('/convidado/{id}', [ConvidadoController::class, 'create']);

Route::post('/convidado/{id}', [ConvidadoController::class, 'store']);

Route::delete('/convidado/{id}', [ConvidadoController::class, 'destroy'])->middleware('auth');


Route::get('/pesquisa', function () {
    return view('pesquisa');
});
