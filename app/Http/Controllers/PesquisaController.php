<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesquisa;
use Illuminate\Http\Request;

class PesquisaController extends Controller
{
    // Mostrar a tela de pesquisa
    public function create() {
        return view('pesquisa/create');
    }

    // Armazenar a pesquisa
    public function store(Request $request) {
        $formFields = $request->validate([
            'pergunta1' => 'required',
            'pergunta2' => 'required',
            'pergunta3' => 'required',
            'pergunta4' => 'required',
            'pergunta5' => 'required',
            'pergunta6' => 'required',
            'pergunta7' => 'required',
            'pergunta8' => 'required',
        ]);

        Pesquisa::create($formFields);

        return redirect('/')->with('mensagem', 'Pesquisa enviada com sucesso!');
    }

    // Mostrar a tela dos resultados da pesquisa
    public function index() {
        $user = User::find(auth()->id());
        if ($user->hasRole('admin')) {
            return view('pesquisa/index', ['pesquisas' => Pesquisa::all()]);
        }
    }
}
