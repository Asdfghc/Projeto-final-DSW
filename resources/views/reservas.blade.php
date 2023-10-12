@unless (count($reservas) == 0)
    
    @foreach($reservas as $reserva)
        <a href="/reserva/{{$reserva->id}}">Data e hora: {{$reserva->dataehora}}</a>
        <p>Status: {{$reserva->status}}</p>
    @endforeach
@else
    <p>Você não possui reservas</p>
@endunless