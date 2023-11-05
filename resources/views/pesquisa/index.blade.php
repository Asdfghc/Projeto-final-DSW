<x-layout>
    <div>
        <h1 style="font-size: 50px; text-align: center;">Resultados das pesquisas de satisfação</h1>
        <table style="width:90%; text-align: center; background-color: #0E0073;">
        <div class="capa" style="width:90%">
            Pergunta 1: Dê uma nota de 0 a 10 para sua festa
            <br>
            Pergunta 2: Dê uma nota de 0 a 10 para a equipe presente na festa
            <br>
            Pergunta 3: Dê uma nota de 0 a 10 para o espaço do buffet
            <br>
            Pergunta 4: Dê uma nota de 0 a 10 para a organização da festa
            <br>
            Pergunta 5: Dê uma nota de 0 a 10 para o funcionamento deste site
            <br>
            Pergunta 6: Qual a probabilidade de 0 a 10 de você recomendar o buffet Fazendinha Feliz para outra pessoa?
            <br>
            Pergunta 7: Você tem algum elogio sobre o buffet Fazendinha Feliz?
            <br>
            Pergunta 8: Você tem alguma crítica/sugestão para o buffet Fazendinha Feliz?
        </div>
        <br>
        <br>
        <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
        </tr>
        @unless (count($pesquisas) == 0)
            @foreach($pesquisas as $pesquisa)
                <tr>
                    <td>{{$pesquisa->pergunta1}}</td>
                    <td>{{$pesquisa->pergunta2}}</td>
                    <td>{{$pesquisa->pergunta3}}</td>
                    <td>{{$pesquisa->pergunta4}}</td>
                    <td>{{$pesquisa->pergunta5}}</td>
                    <td>{{$pesquisa->pergunta6}}</td>
                    <td>{{$pesquisa->pergunta7}}</td>
                    <td>{{$pesquisa->pergunta8}}</td>
                </tr>
            @endforeach
            @else
            <td>Não há pesquisas</td>
            @endunless
        </table>
    </div>
</x-layout>