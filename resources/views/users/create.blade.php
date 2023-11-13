<x-layout>
    <br>
    <br>
    <h1 style="text-align: center;"> Venha ser um cliente de grande felicidade</h1>  
    <br>
    <br>
    <div style="text-align: center;">
        <form method="POST" action="/users">
            @csrf
            <div class="capa">
                <label for="name">Nome</label>
                <input type="text" name="name" value="{{old('name')}}"/>

                <p>(O nome deve conter no mínimo 3 caracteres)</p>
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{old('email')}}"/>

                @error('email')
                    <p>Email Inválido</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="password">Senha</label>
                <input type="password" name="password" value="{{old('password')}}"/>

                <p>(A senha deve conter no mínimo 6 caracteres)</p>
                @error('password')
                    <p>Senha Inválida</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="password_confirmation">Confirme a senha</label>
                <input type="password" name="password_confirmation"/>

                @error('password_confirmation')
                    <p>Senhas não compatíveis</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="a">
                <ul class="myUL">
                    <li><a href="/login" class="a" style="text-align: center;">Ja tem uma conta?</a></li>
                    <button class="botao" type="submit">Cadastrar</button>
                </ul>
            </div>
        </form>
    </div>
</x-layout>