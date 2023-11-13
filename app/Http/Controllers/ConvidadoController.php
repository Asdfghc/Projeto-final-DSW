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
        $i = 1;
        while ($request->input('name'.$i) != null) {
            //Validação dos campos
            $formFields = $request->validate([
                'name'.$i => 'required|min:3|max:100',
                'idade'.$i => 'required|integer|min:0|max:150',
                'CPF'.$i => 'required'
            ]);

            $input = [
                'name' => $formFields['name'.$i],
                'idade' => $formFields['idade'.$i],
                'CPF' => $formFields['CPF'.$i]
            ];

            $input['convuser_id'] = $id;
            
            Convidado::create($input);
            $i++;
        }
        
        return redirect()->back()->with('mensagem', 'Convidado cadastrado com sucesso!');
    }

    // Marca um convidado como presente
    public function presente($id) {
        $convidado = Convidado::findOrFail($id);
        $convidado->confirmado = true;
        $convidado->save();

        return redirect()->back()->with('mensagem', 'Convidado marcado como presente!');
    }

    // Marca um convidado como ausente
    public function ausente($id) {
        $convidado = Convidado::findOrFail($id);
        $convidado->confirmado = false;
        $convidado->save();

        return redirect()->back()->with('mensagem', 'Convidado marcado como ausente!');
    }

    // Deletar convidado do banco de dados
    public function destroy($id) {
        
        Convidado::findOrFail($id)->delete();

        return redirect()->back()->with('mensagem', 'Convidado removido com sucesso!');
    }
}
