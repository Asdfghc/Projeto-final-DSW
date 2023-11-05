<x-layout>
    <br>
    <h1 style="text-align: center; color: #0E0073;"> Faça seu pedido</h1> 
    <br>
    <div class="capa">
        <h2 style="text-align: center;">Horário de funcionamento:</h2>
        <blockquote>
            @foreach($agendas as $agenda)
                <p style="font-size: 22px; text-align: center;">{{$weekMap[$agenda->id-1]}}:<br>{{date('H:i', strtotime($agenda->inicio))}} - {{date('H:i', strtotime($agenda->fim))}}</p>
            @endforeach
        </blockquote>
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
                <input type="datetime-local" name="dataehora_inicio" value="{{old('dataehora_inicio')}}"/>

                @error('dataehora_inicio')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="dataehora_fim">Dia e horário do final</label>
                <br>
                <input type="datetime-local" name="dataehora_fim" value="{{old('dataehora_fim')}}"/>

                @error('dataehora_fim')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="nconvidados">Número aproximado de convidados</label>
                <br>
                <input type="number" step="1" name="nconvidados" max="250" min="1" value="{{old('nconvidados')}}"/>

                @error('nconvidados')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="idade">Idade a ser comemorada</label>
                <br>
                <input type="number" step="1" name="idade" max="100" min="1" value="{{old('idade')}}"/>

                @error('idade')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="servico">Serviço</label>
                <br>
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
            <div calss="a">
                <a href="/servicos" target="_blank" role="button" class="botao">Clique aqui para ver nossos pacotes!</a>
            <div>
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