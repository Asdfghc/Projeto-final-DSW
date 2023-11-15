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
        $i = 1;
        while($request->input('pacote'.$i) != null) {
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
            $i++;
        }
        return redirect('/servicos')->with('mensagem', 'Serviços atualizados com sucesso!');
    }

    //Mostrar a tela de criação dos serviços
    public function create() {
        $user = User::find(auth()->id());
        if ($user->hasRole('user') || $user->hasRole('ope')) {
            return redirect('/');
        }
        return view('servicos/create');
    }

    //Salvar os serviços
    public function store(Request $request) {
        $user = User::find(auth()->id());
        if ($user->hasRole('user') || $user->hasRole('ope')) {
            return redirect('/');
        }
        //Validação dos campos
        $formFields = $request->validate([
            'pacote' => 'required',
            'imagem1' => 'required',
            'imagem2' => 'required',
            'imagem3' => 'required',
            'valor' => 'required|numeric|min:0'
        ]);

        //Cria uma nova linha na tabela no menor id vazio
        Servico::create($formFields);

        //Diminui o id da nova linha criada até o primeiro id vazio
        $i = Servico::max('id');
        while($i > 0) {
            if(Servico::find($i) == null) {
                Servico::where('id', '>', $i)->decrement('id');
            }
            $i--;
        }

        return redirect('/servicos')->with('mensagem', 'Serviço cadastrado com sucesso!');
    }

    //Deletar um serviço
    public function destroy($id) {
        $user = User::find(auth()->id());
        if ($user->hasRole('user') || $user->hasRole('ope')) {
            return redirect('/');
        }

        //Deleta a linha da tabela
        Servico::destroy($id);
        //Diminui o id de todos os serviços com id maior que o deletado
        Servico::where('id', '>', $id)->decrement('id');

        return redirect('/servicos')->with('mensagem', 'Serviço deletado com sucesso!');
    }
}
