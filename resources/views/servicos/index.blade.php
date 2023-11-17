<x-layout>
    <h1 style="text-align: center; color: #0E0073;"> Pacotes de serviço</h1>
    @hasanyrole('admin|comerc')
    <br>
    <a href="/servicos/edit" role="button" class="botao">Edição dos pacotes</a>
    <br>
    <a href="/servicos/create" role="button" class="botao">Criação de pacotes</a>
    @endhasanyrole
    <br>
    @foreach($servicos as $servico)
    <div class="capa" style="text-align: center;">
        {!! $servico->pacote !!}
        <img src="{{ $servico->imagem1 }}" alt="Imagem1" width="150px">
        <img src="{{ $servico->imagem2 }}" alt="Imagem2" width="150px">
        <img src="{{ $servico->imagem3 }}" alt="Imagem3" width="150px">
        <p>Valor: R$ {{ $servico->valor }} por convidado</p>
    </div>
    <br>
    @hasanyrole('admin|comerc')
    <div class="capa" style="padding: 0; width: 12%;">
        <form action="/servicos/{{ $servico->id }}" method="POST">
            @csrf
            @method('delete')
            <div>
                <button type="submit" class="botao" style="border-radius: 10px;">Excluir</button>
            </div>
        </form>
    </div>
    @endhasanyrole
    <br>
    <br>
    @endforeach
</x-layout>