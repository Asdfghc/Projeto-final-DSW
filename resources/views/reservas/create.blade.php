<x-layout>
    <br>
    <h1 style="text-align: center; color: #0E0073;"> Faça seu pedido</h1>  

    <br>
    <br>
    <div class="capa">
        Horário de funcionamento:
        @foreach($agendas as $agenda)
            <p> {{$weekMap[$agenda->id-1]}}: {{$agenda->inicio}} - {{$agenda->fim}}</p>
        @endforeach
    </div>


    <br>
    <br>
    <div style="text-align: center;">
        <form method="POST" action="/reserva">
            @csrf
            <div class="capa">
                <label for="nome">Nome</label>
                <br>
                <input type="text" name="nome" placeholder="nome" value="{{old('nome')}}"/>

                @error('nome')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="dataehora_inicio">Dia e horário do início</label>
                <br>
                <input type="text" name="dataehora_inicio" value="{{old('dataehora_inicio')}}"/>

                @error('dataehora_inicio')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="dataehora_fim">Dia e horário do final</label>
                <br>
                <input type="text" name="dataehora_fim" value="{{old('dataehora_fim')}}"/>

                @error('dataehora_fim')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="nconvidados">Número aproximado de convidados</label>
                <br>
                <input type="number" step="1" name="nconvidados" value="{{old('nconvidados')}}"/>

                @error('nconvidados')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="idade">Idade a ser comemorada</label>
                <br>
                <input type="number" step="1" name="idade" value="{{old('idade')}}"/>

                @error('idade')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <a href="/servicos" target="_blank">Clique aqui para ver nossos pacotes!</a>
                <label for="servico">Serviço</label>
                <select name="servico">
                    <option value="1">Pacote 1</option>
                    <option value="2">Pacote 2</option>
                    <option value="3">Pacote 3</option>
                </select>

                @error('servico')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>

            <div class="a">
                <ul class="myUL">
                  <button class="botao">Confirmar reserva</button>
                  <li><a href="/" class="a">Voltar</a></li>
                </ul>
              </div>
        </form>
    </div>
</x-layout>