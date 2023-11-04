<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Agenda;
use App\Models\Reserva;
use App\Models\Servico;
use App\Models\Convidado;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    // Mostrar todas as reservas
    public function index() {
        $user = User::find(auth()->id());
        if ($user->hasRole('user')) {
            return view('reservas/index', ['reservas' => Reserva::where('user_id', auth()->id())->where('dataehora_fim', '>', Carbon::now('Brazil/East')->toDateTimeString())->orderBy('dataehora_inicio', 'ASC')->get()]);
        }
        elseif ($user->hasRole('ope')) {
            return view('reservas/index', ['reservas' => Reserva::where('status', 'ACEITO')->where('dataehora_fim', '>', Carbon::now('Brazil/East')->toDateTimeString())->orderBy('dataehora_inicio', 'ASC')->get()]);
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

        return view('reservas/show', ['reserva' => $id, 'convidados' => Convidado::where('convuser_id', $id->id)->get(), 'servico' => Servico::find($id->servico)]);
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
        
        return view('reservas/create', ['agendas' => Agenda::all(), 'weekMap' => $weekMap]);
    }

    // Armazenar reserva no banco de dados
    public function store(Request $request) {
        $formFields = $request->validate([
            'nome' => 'required',
            'dataehora_inicio' => 'required',
            'dataehora_fim' => 'required',
            'servico' => 'required',
            'nconvidados' => 'required',
            'idade' => 'required'
        ]);

        if($formFields['dataehora_inicio'] > $formFields['dataehora_fim']) {
            return redirect('/agendamento')->with('mensagem', 'A data de início não pode ser maior que a data de fim!');
        }
        if($formFields['dataehora_inicio'] < Carbon::now('Brazil/East')->toDateTimeString()) {
            return redirect('/agendamento')->with('mensagem', 'A data de início não pode ser menor que a data atual!');
        }

        if($formFields['dataehora_inicio'] < Agenda::find(1+Carbon::now()->dayOfWeek)->dataehora_inicio || $formFields['dataehora_fim'] > Agenda::find(1+Carbon::now()->dayOfWeek)->dataehora_fim) {
            return redirect('/agendamento')->with('mensagem', 'Infelizmente o buffet não está em funcionamento esse horário!');
        }

        // Lista de reservas aceitas
        $reservas = Reserva::where('status', 'ACEITO')->get();
        foreach($reservas as $reserva) {
            // Verifica se a reserva que está sendo criada está dentro de alguma reserva aceita
            if($formFields['dataehora_inicio'] > $reserva->dataehora_inicio && $formFields['dataehora_inicio'] < $reserva->dataehora_fim) {
                return redirect('/agendamento')->with('mensagem', 'A reserva não pode ser criada pois concide com outra reserva aceita!');
            }
            // Verifica se a reserva que está sendo criada está dentro de alguma reserva aceita
            elseif($formFields['dataehora_inicio'] < $reserva->dataehora_inicio && $formFields['dataehora_fim'] > $reserva->dataehora_fim) {
                return redirect('/agendamento')->with('mensagem', 'A reserva não pode ser criada pois concide com outra reserva aceita!');
            }
            // Verifica se a reserva que está sendo criada está dentro de alguma reserva aceita
            elseif($formFields['dataehora_fim'] > $reserva->dataehora_inicio && $formFields['dataehora_fim'] < $reserva->dataehora_fim) {
                return redirect('/agendamento')->with('mensagem', 'A reserva não pode ser criada pois concide com outra reserva aceita!');
            }
            // Verifica se a reserva que está sendo criada está dentro de alguma reserva aceita
            elseif($formFields['dataehora_inicio'] > $reserva->dataehora_inicio && $formFields['dataehora_fim'] < $reserva->dataehora_fim) {
                return redirect('/agendamento')->with('mensagem', 'A reserva não pode ser criada pois concide com outra reserva aceita!');
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
