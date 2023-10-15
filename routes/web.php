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

Route::get('/agendamento', [ReservaController::class, 'create']);

Route::get('/reservas', [ReservaController::class, 'index']);

Route::post('/reserva', [ReservaController::class, 'store']);

Route::get('/reserva/{id}', [ReservaController::class, 'show']);


Route::get('/login', [UserController::class, 'login']);

Route::get('/cadastro', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store']);

Route::get('/confirmacao/{id}', function ($id) {
    return view('confirmacao', ['id' => $id]);
});

Route::get('/pesquisa', function () {
    return view('pesquisa');
});
