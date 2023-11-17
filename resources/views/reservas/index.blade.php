<x-layout>
    <div>
        <h1 style="font-size: 50px; text-align: center;">Lista de Próximas Festas</h1>
        <table style="width:90%; text-align: center; background-color: #0E0073;">
        <tr>
            <th>Data</th>
            <th>Início</th>
            <th>Fim</th>
            <th style="width: 30%">Nome</th>
            <th style="width: 20%">Qntd. estimada de Convidados</th>
            <th>Idade</th>
            <th>Serviço</th>
            @unlessrole('ope')
            <th>Status</th>
            @endunlessrole
            <th>Ver reserva</th>
        </tr>
        @unless (count($reservas) == 0)
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{date('d/m/Y', strtotime($reserva->dataehora_inicio))}}</td>
                    <td>{{date('H:i', strtotime($reserva->dataehora_inicio))}}</td>
                    <td>{{date('H:i', strtotime($reserva->dataehora_fim))}}</td>
                    <td>{{$reserva->nome}}</td>
                    <td>{{$reserva->nconvidados}}</td>
                    <td>{{$reserva->idade}}</td>
                    <td>Pacote {{$reserva->servico}}</td>
                    @unlessrole('ope')
                    <td>{{$reserva->status}}
                    @endunlessrole
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