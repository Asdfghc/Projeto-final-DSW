<x-layout>
    <form method="POST" action="/users/login">
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{old('email')}}"/>

            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password">Senha</label>
            <input type="password" name="password" value="{{old('password')}}"/>

            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Fazer login</button>
        </div>

        <div>
            <p>
                Não tem uma conta?
                <a href="/login">Fazer cadastro</a>
            </p>
        </div>
    </form>
</x-layout>