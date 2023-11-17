<x-layout>
    <br>
    <br>
    <h1 style="text-align: center; color: #0E0073;">Agenda de disponibilidade</h1>
    <br>
    <br>
    @hasanyrole('admin|comerc')
    <div style="text-align: center;"> 
        <a role="button" class="botao" href="/agenda/edit">Alterar horários de funcionamento</a>
    </div>
    <br>
    @endhasanyrole
    <div class="capa">
        <h2 style="text-align: center;">Horário de funcionamento:</h2>
        @foreach($agendas as $agenda)
        <blockquote>
            <p style="font-size: 22px;"> {{$weekMap[$agenda->id-1]}}: <br> {{date('H:i', strtotime($agenda->inicio))}} - {{date('H:i', strtotime($agenda->fim))}}</p>
        </blockquote>
        @endforeach
    </div>
    <br>
    <br>
    <div class="capa">
    <p style="text-align: center;font-size: 20px;">Insira um dia para checar sua disponibilidade:</p>
        <form action="/agenda" method="POST" style="text-align: center;">
            @csrf
            <input type="date" name="data">
            <button type="submit">Checar</button>
        </form>
        <br>
    </div>
    <br>
    <br>
    <br>
</x-layout>