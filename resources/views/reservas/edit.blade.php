<x-layout>
    <br>
    <h1 style="text-align: center; color: #0E0073;"> Edição de serviço</h1>
    <h3 style="text-align: center; font-size: 25px">ATENÇÃO<br><p style="font-size: 20px">Editar seu serviço deixará a reserva pendente e pode resultar em alterações no valor final da sua reserva.</p></h3>
    <div class="capa">
        <a href="/servicos" role="botao" class="botao" target="_blank">Clique aqui para ver os serviços disponíveis</a>
    </div>
    <div style="text-align: center;">
        <form method="POST" action="/reserva/{{$reserva->id}}">
            @csrf
            @method('PUT')
            <br>
            <br>
            <div class="capa">
                <label for="servico">Serviço</label>
                <select name="servico">
                    @for ($i = 0; $i < count($servicos); $i++)
                        @if($servicos[$i]->id == $servico_atual->id)
                            <option value="{{$servicos[$i]->id}}" selected>Pacote {{$servicos[$i]->id}}</option>
                        @else
                            <option value="{{$servicos[$i]->id}}">Pacote {{$servicos[$i]->id}}</option>
                        @endif
                    @endfor
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
                    <p style="color: red" >Serviço Invalido</p>
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