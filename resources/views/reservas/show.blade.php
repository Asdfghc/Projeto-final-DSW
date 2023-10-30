<p>Data e hora: {{ $reserva->dataehora_inicio }} até {{ $reserva->dataehora_fim }}</p>
<p>Status: {{ $reserva->status }}</p>
<p>Nome: {{ $reserva->nome }}</p>
<p>Idade a ser comemorada: {{ $reserva->idade }}</p>
<p>Servico: {{ $reserva->servico }}</p>
<p>Número de convidados estimado: {{ $reserva->nconvidados }}</p>

<form action="/reserva/{{$reserva->id}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Excluir</button>