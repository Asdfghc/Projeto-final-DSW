<x-layout>
    <div>
        @unless (count($reservas) == 0)
            
            @foreach($reservas as $reserva)
                <a href="/reserva/{{$reserva->id}}">Data e hora: {{$reserva->dataehora_inicio}} até {{$reserva->dataehora_fim}}</a>
                <p>Status: {{$reserva->status}}</p>
            @endforeach
        @else
            <p>Você não possui reservas</p>
        @endunless
    </div>
</x-layout>