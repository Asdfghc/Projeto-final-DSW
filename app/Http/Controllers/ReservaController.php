<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Agenda;
use App\Models\Reserva;
use App\Models\Servico;
use App\Models\Convidado;
use App\Models\Recomendacoes;
use Illuminate\Http\Request;
use DateTime;

class ReservaController extends Controller
{
    // Mostrar todas as reservas
    public function index() {
        $user = User::find(auth()->id());
        if ($user->hasRole('user')) {
            return view('reservas/index', ['reservas' => Reserva::where('user_id', auth()->id())->where('dataehora_fim', '>', Carbon::now('Brazil/East')->toDateTimeString())->orderBy('dataehora_inicio', 'ASC')->get()]);
        }
        elseif ($user->hasRole('ope')) {
            return view('reservas/index', ['reservas' => Reserva::where('status', 'ACEITO')->where('dataehora_fim', '>', Carbon::now('Brazil/East')->subDay()->toDateTimeString())->orderBy('dataehora_inicio', 'ASC')->get()]);
        }
        else {
            return view('reservas/index', ['reservas' => Reserva::where('dataehora_fim', '>', Carbon::now('Brazil/East')->toDateTimeString())->orderBy('dataehora_inicio', 'ASC')->get()]);
        }
    }

    // Mostrar uma reserva específica
    public function show(Reserva $id) {
        $user = User::find(auth()->id());
        if($id->user_id != auth()->id() && ($user->hasRole('user'))) {
            return redirect('/reservas');
        }

        return view('reservas/show', ['reserva' => $id, 'convidados' => Convidado::where('convuser_id', $id->id)->get(),
        'servico' => Servico::find($id->servico), 'recomendacoes' => Recomendacoes::all(),
        'nconvidados' => Convidado::where('convuser_id', $id->id)->count(), 'nconvidados_confirmados' => Convidado::where('convuser_id', $id->id)->where('confirmado', '1')->count()]);
    }

    // Mostrar formulário de criação de reserva
    public function create() {
        $weekMap = [
            '0' => 'Domingo',
            '1' => 'Segunda-feira',
            '2' => 'Terça-feira',
            '3' => 'Quarta-feira',
            '4' => 'Quinta-feira',
            '5' => 'Sexta-feira',
            '6' => 'Sábado',
        ];
        
        return view('reservas/create', ['nservicos' => Servico::all()->count()]);
    }

    // Armazenar reserva no banco de dados
    public function store(Request $request) {
        $formFields = $request->validate([
            'nome' => 'required|min:3|max:100',
            'data' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fim' => 'required',
            'servico' => 'required|numeric',
            'nconvidados' => 'required|numeric|min:0|max:250',
            'idade' => 'required|numeric|min:0|max:150',
        ]);

        $formFields['dataehora_inicio'] = $formFields['data'].' '.$formFields['hora_inicio'];
        $formFields['dataehora_fim'] = $formFields['data'].' '.$formFields['hora_fim'];

        if($formFields['dataehora_inicio'] >= $formFields['dataehora_fim']) {
            return redirect('/agendamento')->with('erro', 'A data de início não pode ser maior que a data de fim!');
        }
        if($formFields['dataehora_inicio'] < Carbon::now('Brazil/East')->toDateTimeString()) {
            return redirect('/agendamento')->with('erro', 'A data de início não pode ser menor que a data atual!');
        }
        
        $di = new DateTime($formFields['dataehora_inicio']);
        //$di->format('H:i:s');
        $df = new DateTime($formFields['dataehora_fim']);
        //$df->format('H:i:s');
        
        // $lista = [
        //     $di->format('H:i:s'),
        //     $df->format('H:i:s'),
        //     Agenda::find($dia_da_semana = 1+date('w', strtotime($formFields['dataehora_inicio'])))->inicio,
        //     Agenda::find($dia_da_semana = 1+date('w', strtotime($formFields['dataehora_inicio'])))->fim
        // ];
        // dd($lista);

        if($di->format('H:i:s') < Agenda::find($dia_da_semana = 1+date('w', strtotime($formFields['dataehora_inicio'])))->inicio || $df->format('H:i:s') > Agenda::find($dia_da_semana = 1+date('w', strtotime($formFields['dataehora_inicio'])))->fim) {
            return redirect('/agendamento')->with('mensagem', 'Infelizmente o buffet não está em funcionamento esse horário!');
        }

        // Lista de reservas aceitas
        $reservas = Reserva::where('status', 'ACEITO')->get();
        foreach($reservas as $reserva) {
            // Verifica se a reserva que está sendo criada está dentro de alguma reserva aceita
            if($formFields['dataehora_inicio'] >= $reserva->dataehora_inicio && $formFields['dataehora_inicio'] < $reserva->dataehora_fim) {
                return redirect('/agendamento')->with('erro', 'A reserva não pode ser criada pois concide com outra reserva aceita!');
            }
            // Verifica se a reserva que está sendo criada está dentro de alguma reserva aceita
            elseif($formFields['dataehora_inicio'] <= $reserva->dataehora_inicio && $formFields['dataehora_fim'] >= $reserva->dataehora_fim) {
                return redirect('/agendamento')->with('erro', 'A reserva não pode ser criada pois concide com outra reserva aceita!');
            }
            // Verifica se a reserva que está sendo criada está dentro de alguma reserva aceita
            elseif($formFields['dataehora_fim'] > $reserva->dataehora_inicio && $formFields['dataehora_fim'] <= $reserva->dataehora_fim) {
                return redirect('/agendamento')->with('erro', 'A reserva não pode ser criada pois concide com outra reserva aceita!');
            }
            // Verifica se a reserva que está sendo criada está dentro de alguma reserva aceita
            elseif($formFields['dataehora_inicio'] >= $reserva->dataehora_inicio && $formFields['dataehora_fim'] <= $reserva->dataehora_fim) {
                return redirect('/agendamento')->with('erro', 'A reserva não pode ser criada pois concide com outra reserva aceita!');
            }
        }


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

        return view('reservas/edit', ['reserva' => $id, 'servicos' => Servico::all(), 'servico_atual' => Servico::find($id->servico)]);
    }

    // Atualizar reserva no banco de dados
    public function update(Request $request, Reserva $id) {
        $formFields = $request->validate([
            'servico' => 'required'
        ]);

        $formFields['status'] = 'PENDENTE';

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

    // Negar reserva
    public function negar(Reserva $id) {
        $user = User::find(auth()->id());
        if($user->hasRole('user') || $user->hasRole('ope')) {
            return redirect('/reservas');
        }

        $id->update(['status' => 'NEGADO']);

        return redirect('/reservas')->with('mensagem', 'Reserva negada com sucesso!');
    }

    // Aceitar reserva
    public function aceitar(Reserva $id) {
        $user = User::find(auth()->id());
        if($user->hasRole('user') || $user->hasRole('ope')) {
            return redirect('/reservas');
        }

        $id->update(['status' => 'ACEITO']);

        return redirect('/reservas')->with('mensagem', 'Reserva aceita com sucesso!');
    }

}
