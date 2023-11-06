<x-layout>
    <h1 style="text-align: center; color: #0E0073;"> Pacotes de serviço</h1>
    @hasanyrole('admin|comerc')
        <a href="/servicos/edit">Edição dos pacotes</a>
    @endhasanyrole
    @foreach($servicos as $servico)
    <div style="text-align: center;">
        {!! $servico->pacote !!}
        <img src="{{ $servico->imagem1 }}" alt="Imagem1" width="600px">
        <img src="{{ $servico->imagem2 }}" alt="Imagem2" width="600px">
        <img src="{{ $servico->imagem3 }}" alt="Imagem3" width="600px">
        <p>Valor: R$ {{ $servico->valor }} por convidado</p>
    </div>
    <br>
    <br>
    @endforeach
</x-layout>