<?php

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
    return view('listamentos');
});
//http://localhost:8989/

Route::get('/horas/{h}', function ($h) {
    return response('Eu perdi ' . $h . ' horas da minha vida aprendendo Laravel sendo q nem existe mais php', 200)
        ->header('Content-Type', 'text/plain');
})->where('h', '[0-9]+');
//http://localhost:8989/horas/10

Route::get('/search', function(Request $request) {
    return $request->name . ' ' .$request->city;
});
//http://localhost:8989/search?name=nome&city=cidade