<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\User;
use Illuminate\Http\Request;

class ServicosController extends Controller
{
    //Mostrar todos os serviços
    public function index() {
        return view('servicos/index', ['servicos' => Servico::all()]);
    }

    //Mostrar a tela de edição dos serviços
    public function edit() {
        $user = User::find(auth()->id());
        if ($user->hasRole('user') || $user->hasRole('ope')) {
            return redirect('/');
        }
        return view('servicos/edit', ['servicos' => Servico::all()]);


    }

    //Atualizar os serviços
    public function update(Request $request) {
        $user = User::find(auth()->id());
        if ($user->hasRole('user') || $user->hasRole('ope')) {
            return redirect('/');
        }
        for($i = 1; $i <= 3; $i++) {
            //Validação dos campos
            $formFields = $request->validate([
                'pacote'.$i => 'required',
                'imagem1'.$i => 'required',
                'imagem2'.$i => 'required',
                'imagem3'.$i => 'required',
                'valor'.$i => 'required|numeric|min:0'
            ]);

            $input = [
                'pacote' => $formFields['pacote'.$i],
                'imagem1' => $formFields['imagem1'.$i],
                'imagem2' => $formFields['imagem2'.$i],
                'imagem3' => $formFields['imagem3'.$i],
                'valor' => $formFields['valor'.$i]
            ];
            
            //Atualiza a linha da tabela
            Servico::where('id', $i)->update($input);
        }
        return redirect('/servicos')->with('mensagem', 'Serviços atualizados com sucesso!');
    }
}
