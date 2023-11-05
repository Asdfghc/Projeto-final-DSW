<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Convidado;
use Illuminate\Http\Request;

class ConvidadoController extends Controller
{
    //Criar um convidado
    public function create(Reserva $id) {
        return view('convidados/create', ['id' => $id, 'nome' => $id->nome]);
    }

    // Armazenar convidado no banco de dados
    public function store(Request $request, $id) {
        $formFields = $request->validate([
            'name' => 'required',
            'idade' => 'required',
            'CPF' => 'required'
        ]);

        $formFields['convuser_id'] = $id;
        
        Convidado::create($formFields);

        return redirect('/convidado/'.$id)->with('mensagem', 'Convidado cadastrado com sucesso!');
    }

    // Deletar convidado do banco de dados
    public function destroy($id) {
        
        Convidado::findOrFail($id)->delete();

        return redirect('/reservas')->with('mensagem', 'Convidado removido com sucesso!');
    }
}
