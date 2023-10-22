<x-layout>
    <form method="POST" action="/users">
        @csrf
        <div>
            <label for="name">Nome</label>
            <input type="text" name="name" value="{{old('name')}}"/>

            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

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
            <label for="password_confirmation">Confirme a senha</label>
            <input type="password" name="password_confirmation"/>

            @error('password_confirmation')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Cadastrar</button>
        </div>

        <div>
            <p>
                Já tem uma conta?
                <a href="/login">Login</a>
            </p>
        </div>
    </form>
</x-layout>