<x-layout>
    <head>
        <script type="text/javascript" src='https://cdn.tiny.cloud/1/2b8foqu3g5757fekw52v9slhmcpo233ogz0xxptldzo29bdi/tinymce/6/tinymce.min.js'></script>
        <script>
        tinymce.init({
            selector: "#editor"
        });
        </script>
    </head>
    <h1 style="text-align: center; color: #0E0073;"> Edição dos Pacotes</h1>
    <div style="text-align: center;">
        <form method="POST" action="/servicos">
            @csrf
            @method('PUT')
            @foreach($servicos as $servico)
                <div class="capa">
                    <label for="pacote{{1+$loop->index}}">Pacote {{$servico->id}}</label>
                    <textarea name="pacote{{1+$loop->index}}" id="editor"></textarea>
                </div>
                <br>
                <br>
                <div class="capa">
                    <label for="imagem{{1+$loop->index}}">Imagem do pacote {{$servico->id}}</label>
                    <input type="text" name="imagem{{1+$loop->index}}" value="{{$servico->imagem}}"/>
                </div>
                <br>
                <br>
                <div class="capa">
                    <label for="valor{{1+$loop->index}}">Valor do pacote {{$servico->id}} por convidado</label>
                    <input type="number" step="0.01" name="valor{{1+$loop->index}}" value="{{$servico->valor}}"/>
                </div>
                <br>
                <br>
            @endforeach
            <div class="a">
                <ul class="myUL">
                    <button class="botao">Confirmar alterações</button>
                    <li><a href="/" class="a">Voltar</a></li>
                </ul>
            </div>
        </form>
    </div>
</x-layout>