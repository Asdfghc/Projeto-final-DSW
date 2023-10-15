<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    // Mostrar todas as reservas
    public function index() {
        return view('reservas/index', ['reservas' => Reserva::all()]);
    }

    // Mostrar uma reserva específica
    public function show(Reserva $id) {
        return view('reservas/show', ['reserva' => $id]);
    }

    // Mostrar formulário de criação de reserva
    public function create() {
        return view('reservas/create');
    }

    // Armazenar reserva no banco de dados
    public function store(Request $request) {
        $formFields = $request->validate([
            'nome' => 'required',
            'dataehora_inicio' => 'required',
            'dataehora_fim' => 'required',
            'servico' => 'required',
            'nconvidados' => 'required',
            'idade' => 'required'
        ]);

        Reserva::create($formFields);

        return redirect('/reservas');
    }
}
