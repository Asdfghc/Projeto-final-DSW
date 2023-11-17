<x-layout>
    <h1 style="color: #0E0073;">Crie um novo pacote</h1>
        <form method="POST" action="/servicos">
            @csrf
            <div class="capa">
                <textarea name="pacote" id="editor" value=""></textarea>
                <script>
                    tinymce.init({
                        selector: "#editor",
                        setup: function (editor) {
                            editor.on('init', function () {
                                editor.setContent('{{old('pacote')}}');
                            });
                        }
                    });
                </script>
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="imagem1">Imagem 1 do pacote</label>
                <input type="text" name="imagem1" value="{{old('imagem1')}}"/>
                @error('imagem1')
                    <p style="color: red">imagem Inválida</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="imagem2">Imagem 2 do pacote</label>
                <input type="text" name="imagem2" value="{{old('imagem2')}}"/>
                @error('imagem2')
                    <p style="color: red">imagem Inválida</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="imagem3">Imagem 3 do pacote</label>
                <input type="text" name="imagem3" value="{{old('imagem3')}}"/>
                @error('imagem3')
                    <p style="color: red">imagem Inválida</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="valor">Valor do pacote por convidado</label>
                <input type="number" step="0.01" name="valor" value="{{old('valor')}}"/>
                @error('valor')
                    <p style="color: red">Valor Inválido</p>
                @enderror
            </div>
            <br>
            <br>

            <div class="capa" style="padding: 0; width: 12%;">
                <button type="submit" class="botao" style="border-radius: 10px;">Criar pacote</button>
            </div>
            <br>
            <br>
        </form>
</x-layout>