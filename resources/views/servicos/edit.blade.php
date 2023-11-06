<x-layout>
    <h1 style="text-align: center; color: #0E0073;"> Edição dos Pacotes</h1>
    <div style="text-align: center;">
        <form method="POST" action="/servicos">
            @csrf
            @method('PUT')
            @foreach($servicos as $servico)
                <div class="capa">
                    <label for="pacote{{1+$loop->index}}">Pacote {{$servico->id}}</label>
                    <textarea name="pacote{{1+$loop->index}}" id="editor"></textarea>
                    <script>
                        tinymce.init({
                            selector: "#editor",
                            setup: function (editor) {
                                editor.on('init', function () {
                                    editor.setContent('{!! $servico->pacote !!}');
                                });
                            }
                        });
                    </script>
                </div>
                <br>
                <br>
                <div class="capa">
                    <label for="imagem1{{1+$loop->index}}">Imagem do pacote {{$servico->id}}</label>
                    <input type="text" name="imagem1{{1+$loop->index}}" value="{{$servico->imagem1}}"/>
                </div>
                <br>
                <br>
                <div class="capa">
                    <label for="imagem2{{1+$loop->index}}">Imagem do pacote {{$servico->id}}</label>
                    <input type="text" name="imagem2{{1+$loop->index}}" value="{{$servico->imagem2}}"/>
                </div>
                <br>
                <br>
                <div class="capa">
                    <label for="imagem3{{1+$loop->index}}">Imagem do pacote {{$servico->id}}</label>
                    <input type="text" name="imagem3{{1+$loop->index}}" value="{{$servico->imagem3}}"/>
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
                    <li><a href="/servicos" class="a">Voltar</a></li>
                </ul>
            </div>
        </form>
    </div>
</x-layout>