<x-layout>
    <br>
    <br>
    <h1 style="text-align: center; color: #0E0073;"> Agenda de disponibilidade</h1>
    <br>
    <br>
    @hasanyrole('admin|comerc')
        <a href="/agenda/edit">Alterar horários de funcionamento</a>
    @endhasanyrole
    <div class="capa">
        Horário de funcionamento:
        @foreach($agendas as $agenda)
            <p> {{$weekMap[$agenda->id-1]}}: {{date('H:i', strtotime($agenda->inicio))}} - {{date('H:i', strtotime($agenda->fim))}}</p>
        @endforeach
    </div>
    <br>
    <br>
    <div class="capa">
        Insira um dia para checar sua disponibilidade:
        <form action="/agenda" method="POST">
            @csrf
            <input type="date" name="data">
            <button type="submit">Checar</button>
        </form>
    </div>
</x-layout>