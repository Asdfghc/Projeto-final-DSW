<x-layout>
    <br>
    <div style="text-align: center;">
        <h1 style="color: #0E0073;">Pesquisa de satisfação</h1>
        <form method="POST" action="/pesquisa">
            @csrf
            <div class="capa">
                <label for="pergunta1">Dê uma nota de 0 a 10 para sua festa</label>
                <br>
                <select name="pergunta1" value="{{old('pergunta1')}}">
                    <option value="10" selected>10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>

                @error('pergunta1')
                    <p style="color: red">Escolha uma dass possiveis notas</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="pergunta2">Dê uma nota de 0 a 10 para a equipe presente na festa</label>
                <br>
                <select name="pergunta2" value="{{old('pergunta2')}}">
                    <option value="10" selected>10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>

                @error('pergunta2')
                    <p style="color: red">Escolha uma dass possiveis notas</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="pergunta3">Dê uma nota de 0 a 10 para o espaço do buffet</label>
                <br>
                <select name="pergunta3" value="{{old('pergunta3')}}">
                    <option value="10" selected>10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>

                @error('pergunta3')
                    <p style="color: red">Escolha uma dass possiveis notas</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="pergunta4">Dê uma nota de 0 a 10 para a organização da festa</label>
                <br>
                <select name="pergunta4" value="{{old('pergunta4')}}">
                    <option value="10" selected>10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>

                @error('pergunta4')
                    <p style="color: red">Escolha uma dass possiveis notas</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="pergunta5">Dê uma nota de 0 a 10 para o funcionamento deste site</label>
                <br>
                <select name="pergunta5" value="{{old('pergunta5')}}">
                    <option value="10" selected>10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>

                @error('pergunta5')
                    <p style="color: red">Escolha uma dass possiveis notas</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="pergunta6">Qual a probabilidade de 0 a 10 de você recomendar o buffet Fazendinha Feliz para outra pessoa?</label>
                <br>
                <select name="pergunta6" value="{{old('pergunta6')}}">
                    <option value="10" selected>10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>

                @error('pergunta6')
                    <p style="color: red">Escolha uma dass possiveis notas</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="pergunta7">Você tem algum elogio sobre o buffet Fazendinha Feliz?</label>
                <br>
                <textarea name="pergunta7" value="{{old('pergunta7')}}"></textarea>

                @error('pergunta7')
                    <p style="color: red">Escolha uma dass possiveis notas</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="pergunta8">Você tem alguma crítica/sugestão para o buffet Fazendinha Feliz?</label>
                <br>
                <textarea name="pergunta8" value="{{old('pergunta8')}}"></textarea>

                @error('pergunta8')
                    <p style="color: red">Escolha uma dass possiveis notas</p>
                @enderror
            </div>
            <br>
            <br>


            <div class="a">
                <ul class="myUL">
                  <button class="botao">Enviar pesquisa</button>
                </ul>
              </div>
        </form>
    </div>
</x-layout>