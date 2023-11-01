<x-layout>
    <br>
    <h1 style="text-align: center; color: #0E0073;"> Faça seu pedido</h1>  
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
                <label for="servico">Serviço</label>
                <textarea name="servico" rows="10" placeholder="Exemplo: 2 coxinhas" value="{{old('servico')}}"></textarea>

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