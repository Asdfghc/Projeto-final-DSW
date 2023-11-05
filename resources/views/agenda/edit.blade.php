<x-layout>
    <h1 style="text-align: center; color: #0E0073;"> Edição dos horários de funcionamento</h1>
    <div style="text-align: center;">
        <form method="POST" action="/agenda">
            @csrf
            @method('PUT')
            @foreach($agenda as $dia_da_semana)
                <div class="capa">
                    <p>{{$weekMap[$dia_da_semana->id-1]}}</p>
                    <label for="ini{{1+$loop->index}}">Abertura</label>
                    <input type="time" name="ini{{1+$loop->index}}" placeholder="" value="{{$dia_da_semana->inicio}}"/>
                <br>
                    <label for="fim{{1+$loop->index}}">Fechamento</label>
                    <input type="time" name="fim{{1+$loop->index}}" placeholder="" value="{{$dia_da_semana->fim}}"/>
                </div>
                <br>
                <br>
            @endforeach
            <div class="a">
                <ul class="myUL">
                    <button class="botao">Confirmar alterações</button>
                    <li><a href="/agenda" class="a">Voltar</a></li>
                </ul>
            </div>
        </form>
    </div>
</x-layout>