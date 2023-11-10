<x-layout>
    <h1 style="text-align: center; color: #0E0073;"> Pacotes de serviço</h1>
    @hasanyrole('admin|comerc')
    <br>
    <a href="/servicos/edit" role="button" class="botao">Edição dos pacotes</a>
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
    <br>
    @endforeach
</x-layout>