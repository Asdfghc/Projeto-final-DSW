<x-layout>
    <form method="POST" action="/reserva">
        @csrf
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" placeholder="nome" value="{{old('nome')}}"/>

            @error('nome')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="dataehora_inicio">Dia e horário do início</label>
            <input type="text" name="dataehora_inicio" value="{{old('dataehora_inicio')}}"/>

            @error('dataehora_inicio')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="dataehora_fim">Dia e horário do final</label>
            <input type="text" name="dataehora_fim" value="{{old('dataehora_fim')}}"/>

            @error('dataehora_fim')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nconvidados">Número aproximado de convidados</label>
            <input type="number" step="1" name="nconvidados" value="{{old('nconvidados')}}"/>

            @error('nconvidados')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="idade">Idade a ser comemorada</label>
            <input type="number" step="1" name="idade" value="{{old('idade')}}"/>

            @error('idade')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="servico">Serviço</label>
            <textarea name="servico" rows="10" placeholder="Exemplo: 2 coxinhas" value="{{old('servico')}}"></textarea>

            @error('servico')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button>Fazer reserva</button>
            <a href="/">Back</a>
        </div>
    </form>
</x-layout>