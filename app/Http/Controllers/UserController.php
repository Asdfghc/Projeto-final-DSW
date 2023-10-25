<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // Mostrar formulário de login
    public function login() {
        return view('users/login');
    }

    // Autenticar usuário
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('mensagem', 'Login realizado com sucesso!');
        }

        return back()->withErrors([
            'email' => 'As credenciais informadas não foram encontradas em nosso sistema.'
        ])->onlyInput('email');
    }

    // Mostrar formulário de cadastro
    public function create() {
        return view('users/create');
    }

    // Salvar usuário no banco de dados
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        $user->assignRole('user');

        auth()->login($user);

        return redirect('/')->with('mensagem', 'Usuário cadastrado com sucesso!');
    }

    // Fazer logout
    public function logout(Request $request) {
        auth()->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('mensagem', 'Logout realizado com sucesso!');
    }

}
