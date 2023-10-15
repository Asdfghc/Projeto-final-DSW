<x-layout>
    <form method="POST" action="/reserva">
        @csrf
        <div class="mb-6">
            <label
                for="nome"
                class="inline-block text-lg mb-2"
                >Nome</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="nome"
                placeholder="nome"
            />

            @error('nome')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="dataehora_inicio"
                class="inline-block text-lg mb-2"
                >Dia e horário do início</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="dataehora_inicio"
            />

            @error('dataehora_inicio')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="dataehora_fim" class="inline-block text-lg mb-2"
                >Dia e horário do final</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="dataehora_fim"
            />

            @error('dataehora_fim')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="nconvidados" class="inline-block text-lg mb-2"
                >Número aproximado de convidados</label
            >
            <input
                type="number" step="1"
                class="border border-gray-200 rounded p-2 w-full"
                name="nconvidados"
            />

            @error('nconvidados')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="idade" class="inline-block text-lg mb-2"
            >
                Idade a ser comemorada
            </label>
            <input
                type="number" step="1"
                class="border border-gray-200 rounded p-2 w-full"
                name="idade"
            />

            @error('idade')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="servico"
                class="inline-block text-lg mb-2"
            >
                Serviço
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="servico"
                rows="10"
                placeholder="Exemplo: 2 coxinhas"
            ></textarea>

            @error('servico')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
            >
                Fazer reserva
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
</x-layout>