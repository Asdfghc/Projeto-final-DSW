<x-layout>
    <h1 style="font-size: 50px; text-align: center;">Lista de horários</h1>
    <table style="width:90%; text-align: center;">
        @unless (count($reservas) == 0)
            <tr>
                <th>Horário de início</th>
                <th>Horário de fim</th>
                <th>Status</th>
            </tr>
            @foreach ($reservas as $reserva)
                <tr>
                    <td>{{date('H:i', strtotime($reserva->dataehora_inicio))}}</td>
                    <td>{{date('H:i', strtotime($reserva->dataehora_fim))}}</td>
                    <td>{{$reserva->status}}</td>
                </tr>
            @endforeach
        @else
            <td>Não há reservas nesse dia</td>
        @endunless
    </table>
</x-layout>