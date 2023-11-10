<x-layout>
    <h1 style="font-size: 40px; text-align: center;">Ficamos felizes com sua reserva! Lembre-se de chegar antes</h1>
    <table style="width:90%; text-align: center; background-color: #0E0073;">
        <tr>
            <th>Data
            <th>Horário
            @unlessrole('ope')
            <th>Status
            @endunlessrole
            <th>Nome
            <th>Idade a ser comemorada
            <th>Serviço <br>
            @unlessrole('ope')
            <a href="/reserva/{{$reserva->id}}/edit" style="font-size: 20px; ">Editar seviço</a>
            @endunlessrole
            <th>Valor por convidado
            <th>Valor total
        </tr>
        <tr>
            <td>{{ date('d/m/Y', strtotime($reserva->dataehora_inicio)) }}
            <td>{{ date('H:i', strtotime($reserva->dataehora_inicio)) }} até {{ date('H:i', strtotime($reserva->dataehora_fim)) }}
            @unlessrole('ope')
            <td>{{ $reserva->status }}
            @endunlessrole
            <td>{{ $reserva->nome }}
            <td>{{ $reserva->idade }}
            <td>Pacote <a href="/servicos" target="_blank">{{ $reserva->servico }}</a>
            <td>R$ {{ $servico->valor }}
            <td>R$ {{ $servico->valor * $reserva->nconvidados }}
        </tr>
    </table>
    <br>
    <br>
    <div class="capa">
        <p style="font-size: 25px; text-align: center; padding: 5px; margin: 5px">Número de convidados: <b>{{ $reserva->nconvidados }}</b></p>
    </div>
    <br>
    <br>
    @if ($reserva->status == 'ACEITO')
    <div class="capa">
        <p style="font-size: 25px; text-align: center; padding: 5px; margin: 5px"> Link para convidados <br><a href="/convidado/{{$reserva->id}}" target="_blank" style="color: gold"><b>Clique aqui</b></a></p>
    </div>
        <div>
            <h2 style="font-size: 50px; text-align: center;">Lista de convidados confirmados</h2>
            <table style="width:90%; text-align: center; background-color: #0E0073;">
                <tr>
                    <th>Nome
                    @role('ope')
                    <th>Presença
                    @endrole
                    <th> 
                </tr>
                @unless (count($convidados) == 0)
                @foreach($convidados as $convidado)
                    
                    <tr>
                        <td>{{$convidado->name}}</td>
                        @role('ope')
                        <td>
                        <form>
                            <div>
                                <input type="checkbox" id="presenca" name="presenca" />
                            </div>
                        </form>
                        </td>
                        @endrole
                        <td>
                        <form action="/convidado/{{$convidado->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir Convidado</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <td>Ainda não há convidados confirmados</td>
            @endunless
        </table>
    </div>
    @endif

    <br>
    <br>
    <form action="/reserva/{{$reserva->id}}" method="POST">
        @csrf
        @method('DELETE')
        @hasanyrole('admin|comerc|user')
        <button type="submit" class="botao">Excluir reserva</button>
        @endhasanyrole
</x-layout>