<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservaController;

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

Route::get('/reserva/{id}', [ReservaController::class, 'show'])->middleware('auth');


Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/login', [UserController::class, 'authenticate'])->middleware('guest');

Route::get('/cadastro', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/confirmacao/{id}', function ($id) {
    return view('confirmacao', ['id' => $id]);
});

Route::get('/pesquisa', function () {
    return view('pesquisa');
});
