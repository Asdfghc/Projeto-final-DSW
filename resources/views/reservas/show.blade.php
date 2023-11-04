<x-layout>
    <p>Ficamos felizes com sua reserva! Lembre-se de sla chegar antes</p>
    <p>Data e hora: {{ $reserva->dataehora_inicio }} até {{ $reserva->dataehora_fim }}</p>
    <p>Status: {{ $reserva->status }}</p>
    <p>Nome: {{ $reserva->nome }}</p>
    <p>Idade a ser comemorada: {{ $reserva->idade }}</p>
    <a href="/servicos">Servico: Pacote {{ $reserva->servico }}</a>
    <p>Valor: R$ {{ $servico->valor }}</p>
    <a href="/reserva/{{$reserva->id}}/edit">Editar seviço</a>
    <p>Número de convidados estimado: {{ $reserva->nconvidados }}</p>
    @if ($reserva->status == 'ACEITO')
        <p>Formulário de confirmação de convidados: <a href="/convidado/{{$reserva->id}}">Clique aqui</a></p>
        <div>
            <h2 style="font-size: 50px; text-align: center;">Lista de convidados confirmados</h2>
            <table style="width:90%; text-align: center;">
                @unless (count($convidados) == 0)
                @foreach($convidados as $convidado)
                    <tr>
                        <td>{{$convidado->name}}</td>
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
        <button type="submit">Excluir reserva</button>
</x-layout>