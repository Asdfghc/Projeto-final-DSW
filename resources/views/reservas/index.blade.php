<x-layout>
    <div>
        <h1 style="font-size: 50px; text-align: center;">Lista de Próximas Festas</h1>
        <table style="width:90%; text-align: center;">
        <tr>
            <th>Início</th>
            <th>Fim</th>
            <th style="width: 30%">Nome</th>
            <th style="width: 20%">Qntd. estimada de Convidados</th>
            <th>Idade</th>
            <th>Serviço</th>
            <th>Status</th>
            <th>Ver reserva</th>
        </tr>
        @unless (count($reservas) == 0)
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{$reserva->dataehora_inicio}}</td>
                    <td>{{$reserva->dataehora_fim}}</td>
                    <td>{{$reserva->nome}}</td>
                    <td>{{$reserva->nconvidados}}</td>
                    <td>{{$reserva->idade}}</td>
                    <td>Pacote {{$reserva->servico}}</td>
                    <td>{{$reserva->status}}
                    @hasanyrole('admin|comerc')
                    <br><a href="/reserva/{{$reserva->id}}/negar">Negar</a>
                    <br><a href="/reserva/{{$reserva->id}}/aceitar">Aceitar</a>
                    @endhasanyrole
                    </td>
                    <td><a href="/reserva/{{$reserva->id}}">Mais detalhes</td>
                </tr>
            @endforeach
            @else
            <td>Você não possui reservas</td>
            @endunless
            @role('user')
                <td><a href="/agendamento">Fazer reserva</a></td>
            @endrole
        </table>
    </div>
</x-layout>