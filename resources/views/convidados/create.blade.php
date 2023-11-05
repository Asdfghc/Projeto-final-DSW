<x-layout>
    <script>
        function formatar(mascara, documento) {
          let i = documento.value.length;
          let saida = '#';
          let texto = mascara.substring(i);
          while (texto.substring(0, 1) != saida && texto.length) {
            documento.value += texto.substring(0, 1);
            i++;
            texto = mascara.substring(i);
          }
        }
    </script>
    <br>
    <div style="text-align: center;">
        <h1 style="color: #0E0073;">Parabéns!!<br> Você foi chamado para a festa de {{ $nome }}</h1>
        <form method="POST" action="/convidado/{{$id->id}}">
            @csrf
            <div class="capa">
                <label for="name">name</label>
                <br>
                <input type="text" name="name" placeholder="name" value="{{old('name')}}"/>

                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="idade">Idade</label>
                <br>
                <input type="number" step="1" name="idade" max="100" min="0" value="{{old('idade')}}"/>

                @error('idade')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="CPF">CPF</label>
                <br>
                <input type="text" name="CPF" placeholder="___.___.___-__" maxlength="14"
              OnKeyPress="formatar('###.###.###-##',this)" value="{{old('CPF')}}"/>

                @error('CPF')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>

            <div class="a">
                <ul class="myUL">
                  <button class="botao">Confirmar reserva</button>
                </ul>
              </div>
        </form>
    </div>
</x-layout>