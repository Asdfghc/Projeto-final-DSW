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
        let n = 2;
        function addConv(){
            let conv = document.querySelector('.conv');
            let clone = conv.cloneNode(true);
            
            clone.querySelector('.titulo').textContent = `Convidado ${n}`;
            clone.querySelector('.capa input[name="name1"]').name = `name${n}`;
            clone.querySelector('.capa input[name="idade1"]').name = `idade${n}`;
            clone.querySelector('.capa input[name="CPF1"]').name = `CPF${n}`;

            conv.parentNode.insertBefore(clone, conv.parentNode.childNodes[conv.parentNode.childNodes.length - 10]);
            n++;
        }
    

    </script>
    <br>
    <div style="text-align: center;">
        <h1 style="color: #0E0073;">Parabéns!!<br> Você foi chamado para a festa de {{ $nome }}</h1>
        <form method="POST" action="/convidado/{{$id->id}}">
            @csrf
            <div class="conv">
                <h3 class="titulo">Convidado 1</h3>
                <div class="capa">
                    <label for="name1">name</label>
                    <br>
                    <input type="text" name="name1" placeholder="Nome" value="{{old('name1')}}"/>

                    @error('name1')
                        <p>Nome Inválido</p>
                    @enderror
                </div>
                <br>
                <br>
                <div class="capa">
                    <label for="idade1">Idade</label>
                    <br>
                    <input type="number" step="1" name="idade1" max="100" min="0" value="{{old('idade1')}}"/>

                    @error('idade1')
                        <p>Idade Inválida</p>
                    @enderror
                </div>
                <br>
                <br>
                <div class="capa">
                    <label for="CPF1">CPF</label>
                    <br>
                    <input type="text" name="CPF1" placeholder="___.___.___-__" maxlength="14"
                OnKeyPress="formatar('###.###.###-##',this)" value="{{old('CPF1')}}"/>

                    @error('CPF1')
                        <p>CPF Inválido</p>
                    @enderror
                </div>
                <br>
                <br>
            </div>
            <br>
            
            <button class="botao" type="button" onclick="addConv()">Adicionar outro convidado</button>
            
            <br>
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