<x-layout>
    <br>
    <h1 style="text-align: center; color: #0E0073;"> Faça seu pedido</h1>  
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
                    <p>Nome Inválido</p>
                @enderror
            </div>
            <br>
            <div class="capa">
            
                <label for="data">Dia</label>
                <br>
                <input type="date" name="data" value="{{old('data')}}"/>

                @error('data')
                    <p>Data Inválida</p>
                @enderror
                <br>
                <br>
                <label for="hora_inicio">Horário do início</label>
                <br>
                <input type="time" name="hora_inicio" value="{{old('hora_inicio')}}"/>

                @error('hora_inicio')
                    <p>Hora Inválida</p>
                @enderror
                <br>
                <br>
                <label for="hora_fim">Horário do final</label>
                <br>
                <input type="time" name="hora_fim" value="{{old('hora_fim')}}"/>

                @error('hora_fim')
                    <p>Hora Inválida</p>
                @enderror
            </div>
            <br>
            <div>
                <a href="/agenda" target="_blank" role="button" class="botao"  style="border-radius: 10px;">Clique aqui para ver nossos horarios</a>
            </div>
            <br>
            <div class="capa">
                <label for="nconvidados">Número aproximado de convidados</label>
                <br>
                <input type="number" step="1" name="nconvidados" value="{{old('nconvidados')}}"/>

                @error('nconvidados')
                    <p>Numero Inválido</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="idade">Idade a ser comemorada</label>
                <br>
                <input type="number" step="1" name="idade" value="{{old('idade')}}"/>

                @error('idade')
                    <p>Idade Inválida</p>
                @enderror
            </div>
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
                    <p>Escolha um dos Possiveis Serviços</p>
                @enderror
            </div>
            <br>
            <div>
                <a href="/servicos" target="_blank" role="button"  style="border-radius: 10px;" class="botao">Clique aqui para ver nossos pacotes!</a>
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