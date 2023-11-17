<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Agenda;
use App\Models\Reserva;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // Mostrar a agenda
    public function index() {
        $weekMap = [
            '0' => 'Domingo',
            '1' => 'Segunda-feira',
            '2' => 'Terça-feira',
            '3' => 'Quarta-feira',
            '4' => 'Quinta-feira',
            '5' => 'Sexta-feira',
            '6' => 'Sábado',
        ];
        return view('agenda/index', ['agendas' => Agenda::all(), 'weekMap' => $weekMap]);
    }

    // Mostrar a tela de edição da agenda
    public function edit() {
        $weekMap = [
            '0' => 'Domingo',
            '1' => 'Segunda-feira',
            '2' => 'Terça-feira',
            '3' => 'Quarta-feira',
            '4' => 'Quinta-feira',
            '5' => 'Sexta-feira',
            '6' => 'Sábado',
        ];
        return view('agenda/edit', ['agenda' => Agenda::all(), 'weekMap' => $weekMap]);
    }

    // Atualizar a agenda
    public function update(Request $request) {
        for($i = 1; $i <= 7; $i++) {
            //Validação dos campos
            $formFields = $request->validate([
                'ini'.$i => 'required',
                'fim'.$i => 'required'
            ]);

            $input = [
                'inicio' => $formFields['ini'.$i],
                'fim' => $formFields['fim'.$i],
            ];
            
            //Atualiza a linha da tabela
            Agenda::where('id', $i)->update($input);
        }
        return redirect('/agenda')->with('mensagem', 'Agenda atualizada com sucesso!');
    }

    // Mostrar a tela de disponibilidades
    public function show(Request $request) {
        $data = $request->validate([
            'data' => 'required'
        ]);

        return view('agenda/show', ['reservas' => Reserva::where('dataehora_inicio', 'LIKE', $data['data'].'%')->orderBy('dataehora_inicio', 'ASC')->get()]);
    }
}
