<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReservaController extends Controller
{
    // Mostrar todas as reservas
    public function index() {
        $user = User::find(auth()->id());
        if ($user->hasRole('user')) {
            return view('reservas/index', ['reservas' => Reserva::where('user_id', auth()->id())->get()]);
        }
        elseif ($user->hasRole('ope')) {
            return redirect('/');
        }
        else {
            return view('reservas/index', ['reservas' => Reserva::all()]);
        }
    }

    // Mostrar uma reserva específica
    public function show(Reserva $id) {
        $user = User::find(auth()->id());
        if($id->user_id != auth()->id() && ($user->hasRole('user')) || $user->hasRole('ope')) {
            return redirect('/reservas');
        }

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

        $formFields['user_id'] = auth()->id();

        Reserva::create($formFields);

        return redirect('/reservas')->with('mensagem', 'Reserva cadastrada com sucesso!');
    }

    // Mostrar formulário de edição de reserva
    public function edit(Reserva $id) {
        $user = User::find(auth()->id());
        if($id->user_id != auth()->id() && ($user->hasRole('user')) || $user->hasRole('ope')) {
            return redirect('/reservas');
        }

        return view('reservas/edit', ['reserva' => $id]);
    }

    // Atualizar reserva no banco de dados
    public function update(Request $request, Reserva $id) {
        $formFields = $request->validate([
            'servico' => 'required'
        ]);

        $id->update($formFields);

        return redirect('/reservas')->with('mensagem', 'Reserva atualizada com sucesso!');
    }

    // Remover reserva do banco de dados
    public function destroy(Reserva $id) {
        $user = User::find(auth()->id());
        if($id->user_id != auth()->id() && ($user->hasRole('user')) || $user->hasRole('ope')) {
            return redirect('/reservas');
        }

        $id->delete();

        return redirect('/reservas')->with('mensagem', 'Reserva removida com sucesso!');
    }

}
