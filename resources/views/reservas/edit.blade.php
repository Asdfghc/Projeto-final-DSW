<x-layout>
    <br>
    <h1 style="text-align: center; color: #0E0073;"> Edição de serviço</h1>
    <p>ATENÇÃO<br>Editar seu serviço deixará a reserva pendente e pode resultar em alterações no valor final da sua reserva.</p>  
    <div style="text-align: center;">
        <form method="POST" action="/reserva/{{$reserva->id}}">
            @csrf
            @method('PUT')
            <br>
            <br>
            <div class="capa">
                <label for="servico">Serviço</label>
                <textarea name="servico" rows="10" placeholder="Exemplo: 2 coxinhas" value="{{$reserva->servico}}"></textarea>

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