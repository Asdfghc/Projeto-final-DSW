<x-layout>
    <br>
    <h1 style="text-align: center; color: #0E0073;"> Qual a nova recomendação? </h1>  
    <br>
    <br>
    <div style="text-align: center;">
        <form method="POST" action="/recomendacoes">
            @csrf
            <div class="capa">
                <label for="recomendacao">Insira uma nova recomendação</label>
                <br>
                <input type="text" name="recomendacao" placeholder="Recomendação" value="{{old('recomendacao')}}"/>

                @error('recomendacao')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="a">
                <ul class="myUL">
                    <button class="botao" style="border-radius: 5px;">Confirmar recomendação</button>
                </ul>
            </div>
        </form>
        <br>
        <br>
        <br>
        <div class="capa">
            @foreach($recomendacoes as $recomendacao)
            <p>{{$recomendacao->recomendacao}}</p>
            <form action="/recomendacoes/edit/{{$recomendacao->id}}" method="POST">
                @csrf
                @method('PUT')
                <textarea name="recomendacao" placeholder="Recomendação" value="">{{$recomendacao->recomendacao}}</textarea>
                <br>
                <br>
                <button type="submit">Editar recomendação</button>
            </form>
            <br>
            <form action="/recomendacoes/{{$recomendacao->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir recomendação</button>
                <br>
                <br>
            </form>
            @endforeach
        </div>
    </div>
</x-layout>