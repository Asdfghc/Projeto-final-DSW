<x-layout>
    <div>
        @unless (count($reservas) == 0)
            
            @foreach($reservas as $reserva)
                <a href="/reserva/{{$reserva->id}}">Data e hora: {{$reserva->dataehora_inicio}} até {{$reserva->dataehora_fim}}</a>
                <p>Status: {{$reserva->status}}</p>
                
            @endforeach
        @else
            <p style="text-align: center; color: #0E0073; font-size: 60px">Você não possui reservas 😭</p>
        @endunless
    </div>
</x-layout>