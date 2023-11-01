<p>Data e hora: {{ $reserva->dataehora_inicio }} até {{ $reserva->dataehora_fim }}</p>
<p>Status: {{ $reserva->status }}</p>
<p>Nome: {{ $reserva->nome }}</p>
<p>Idade a ser comemorada: {{ $reserva->idade }}</p>
<p>Servico: {{ $reserva->servico }}</p>
<p>Número de convidados estimado: {{ $reserva->nconvidados }}</p>
@if ($reserva->status == 'ACEITO')
    <p>Formulário de confirmação de convidados: <a href="/convidado/{{ $reserva->id }}">Clique aqui</a></p>
@endif
<form action="/reserva/{{$reserva->id}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>