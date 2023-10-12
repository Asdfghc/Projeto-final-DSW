<?php

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/agendamento', function () {
    return view('agedamento');
});

Route::get('/reservas', function () {
    return view('reservas', ['reservas' => Reserva::all()]);
});

Route::get('/reserva/{id}', function ($id) {
    return view('reserva', ['reserva' => Reserva::find($id)]);
});

Route::get('/confirmacao/{id}', function ($id) {
    return view('confirmacao', ['id' => $id]);
});

Route::get('/pesquisa', function () {
    return view('pesquisa');
});
