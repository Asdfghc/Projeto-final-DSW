<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Mostrar formulário de login
    public function login() {
        return view('users/login');
    }

    // Mostrar formulário de cadastro
    public function create() {
        return view('users/create');
    }

    // Salvar usuário no banco de dados
    public function store(Request $request) {
        $formFields = $request->validate([
            'nome' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'senha' => ['required|confirmed|min:6']
        ]);

        $formFields['senha'] = bcrypt($formFields['senha']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/');
    }
}
