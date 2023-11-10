<x-layout>
    <br>
    <h1 style="text-align: center; color: #0E0073;"> Edição de serviço</h1>
    <h3>ATENÇÃO</h3><br><p>Editar seu serviço deixará a reserva pendente e pode resultar em alterações no valor final da sua reserva.</p>  
    <a href="/servicos" target="_blank">Clique aqui para ver os serviços disponíveis</a>
    <div style="text-align: center;">
        <form method="POST" action="/reserva/{{$reserva->id}}">
            @csrf
            @method('PUT')
            <br>
            <br>
            <div class="capa">
                <label for="servico">Serviço</label>
                <select name="servico">
                    <option value="1">Pacote 1</option>
                    <option value="2">Pacote 2</option>
                    <option value="3">Pacote 3</option>
                </select>

                @foreach($servicos as $servico)
                    @if($servico->id == $servico_atual->id)
                        <p>Pacote atual: {{$servico->id}}</p>
                        <p>Valor atual: R$ {{$servico->valor}} por convidado</p>
                    @else
                        <p>Diferença de preço entre o pacote atual e o pacote {{$servico->id}}: R$ {{$servico->valor - $servico_atual->valor}} por convidado 
                        @if($servico->valor - $servico_atual->valor > 0)
                            (a pagar)
                        @else
                            (a receber)
                        @endif
                        </p>
                    @endif
                @endforeach

                @error('servico')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>

            <div class="a">
                <ul class="myUL">
                  <button class="botao">Confirmar alteração</button>
                  <li><a href="/reservas" class="a">Voltar</a></li>
                </ul>
              </div>
        </form>
    </div>
</x-layout>