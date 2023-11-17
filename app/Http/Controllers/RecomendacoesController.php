<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recomendacoes;

class RecomendacoesController extends Controller
{
    // Mostrar a tela de recomendações
    public function index()
    {
        return view('recomendacoes/index', ['recomendacoes' => Recomendacoes::all()]);
    }

    // Armazenar recomendação no banco de dados
    public function store(Request $request)
    {
        //Validação dos campos
        $formFields = $request->validate([
            'recomendacao' => 'required'
        ]);
        
        Recomendacoes::create($formFields);
        
        return redirect()->back()->with('mensagem', 'Recomendação enviada com sucesso!');
    }
    
    // Deletar recomendação do banco de dados
    public function destroy($id)
    {
        Recomendacoes::findOrFail($id)->delete();

        return redirect()->back()->with('mensagem', 'Recomendação removida com sucesso!');
    }

    // Atualizar recomendação no banco de dados
    public function update(Request $request, $id)
    {
        //Validação dos campos
        $formFields = $request->validate([
            'recomendacao' => 'required'
        ]);

        Recomendacoes::findOrFail($id)->update($formFields);

        return redirect()->back()->with('mensagem', 'Recomendação atualizada com sucesso!');
    }
}
