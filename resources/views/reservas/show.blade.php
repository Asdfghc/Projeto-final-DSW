<x-layout>
    @unlessrole('ope|admin|comerc')
    <h1 style="font-size: 40px; text-align: center;">Ficamos felizes com sua reserva!</h1>
    @else
    <br>
    <br>
    @endunlessrole
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
            <th>Valor total estimado
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
        <p style="font-size: 27px; text-align: left; padding: 5px; margin: 5px"><b>Recomendações:</b></p>
        @foreach($recomendacoes as $recomendacao)
            <p style="font-size: 25px; text-align: left; padding: 5px; margin: 5px"><br>- {{ $recomendacao->recomendacao }}</p>
        @endforeach
    </div>
    <br>
    <br>
    <div class="capa">
        <p style="font-size: 25px; text-align: center; padding: 5px; margin: 5px"> Link para convidados <br><a href="/convidado/{{$reserva->id}}" target="_blank" style="color: gold"><b>Clique aqui</b></a></p>
    </div>
        <div>
            <h2 style="font-size: 50px; text-align: center;">Lista de convidados presentes</h2>
            @role('ope')
            <div style="font-size: 30px; text-align: center;"><p>Convidados presentes: <b>{{ $nconvidados_confirmados }} / {{ $nconvidados }}</b></p></div>
            <div style="font-size: 30px; text-align: center;"><p>Valor total final: <b>R$ {{ $nconvidados_confirmados * $servico->valor }}</b></p></div>
            @endrole
            <table style="width:90%; text-align: center; background-color: #0E0073;">
                <tr>
                    <th>Nome
                    @hasanyrole('admin|comerc|ope')
                    <th>Idade
                    <th>CPF
                    @endhasanyrole
                    @role('ope')
                    <th>Presença
                    @endrole
                    <th> 
                </tr>
                @unless (count($convidados) == 0)
                @foreach($convidados as $convidado)
                    
                    <tr>
                        <td>{{$convidado->name}}</td>
                        @hasanyrole('admin|comerc|ope')
                        <td>{{$convidado->idade}}</td>
                        <td>{{$convidado->CPF}}</td>
                        @endhasanyrole
                        @role('ope')
                        <td>
                        <div>
                            <input type="checkbox" id="presenca{{$loop->index}}" name="presenca"/>
                        </div>
                        <script>
                            var checkbox{{$loop->index}} = document.getElementById("presenca{{$loop->index}}");
                            checkbox{{$loop->index}}.checked = {{$convidado->confirmado}};
                            checkbox{{$loop->index}}.addEventListener('change', function () {
                                if (checkbox{{$loop->index}}.checked) {
                                    window.location.href = "/convidado/{{$convidado->id}}/presente";
                                } else {
                                    window.location.href = "/convidado/{{$convidado->id}}/ausente";
                                }
                            });
                        </script>
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
        @hasanyrole('admin|comerc|ope')
        <div style="font-size: 20px; text-align: center; padding: 5px; margin: 5px">
            <a href="/convidado/{{$reserva->id}}" target="_blank">Adicionar convidados</a>
        </div>
        @endhasanyrole
    </div>
    @elseif ($reserva->status == 'NEGADO')
        <p style="font-size: 50px; text-align: center; padding: 5px; margin: 5px">Infelizmente não foi possível realizar sua reserva. Por favor, tente uma nova data e horário.</p>
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