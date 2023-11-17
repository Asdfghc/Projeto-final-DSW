<x-layout>
    <br>
    <h1 style="text-align: center; color: #0E0073;">Faça seu login</h1>  
    <br>
    <form method="POST" action="/users/login">
        @csrf

        <div class="capa">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{old('email')}}"/>

            @error('email')
                <p style="color: red">Email ou Senha Inválidos</p>
            @enderror
        </div>

        <br>

        <div class="capa">
            <label for="password">Senha</label>
            <input type="password" name="password" value="{{old('password')}}"/>
        </div>

        <br>
        <br>
        <br>
        <div class="a">
            <ul class="myUL">
                <button type="submit" class="botao">Fazer login</button>
                <li><a href="/cadastro" class="a">Não tem conta?</a></li>
            </ul>
        </div>
    </form>
</x-layout>