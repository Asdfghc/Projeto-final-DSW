<x-layout>
    <style>
        body {
            background-color: antiquewhite;
        }
        ul.myUL {
            display: inline-block;
            position: absolute;
            transform: translate(-50%, -50%);
        }
        .a{
            display: block;
            text-align: center;
            color: gold;
            background-color: #0E0073;
            border-radius: 25px;
            margin: 4px 2px;
        }
        .botao{
            background-color: #0E0073;
            border: none;
            border-radius: 25px;
            color: gold;
            padding: 16px 32px;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 4px 2px;
            cursor: pointer;
        }
        button:hover{
            background-color: #0E0073;
            color: white;
        }

        input[type=text] {
            padding: 5px 5px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            background-color: white;
            color: black;
            border: 2px solid #0E0073;
            border-radius: 5px;
        }

        input[type=email] {
            padding: 5px 5px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            background-color: white;
            color: black;
            border: 2px solid #0E0073;
            border-radius: 5px;
        }

        input[type=password] {
            padding: 5px 5px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            background-color: white;
            color: black;
            border: 2px solid #0E0073;
            border-radius: 5px;
        }

        input[type=text]:focus {
            background-color: #C1B0F0;
        }

        input[type=password]:focus {
            background-color: #C1B0F0;
        }

        .capa{
            display: block;
            background-color: #0E0073;
            color: gold;
            border-radius: 10px;
            margin: auto;
            width: 14%;
            padding: 10px;
        }
    </style>
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
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="password">Senha</label>
                <input type="password" name="password" value="{{old('password')}}"/>

                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="capa">
                <label for="password_confirmation">Confirme a senha</label>
                <input type="password" name="password_confirmation"/>

                @error('password_confirmation')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="a">
                <ul class="myUL">
                    <li><a href="/login" target="_blank" class="a" style="text-align: center;">Ja tem uma conta?</a></li>
                    <button class="botao" type="submit">Cadastrar</button>
                </ul>
            </div>
        </form>
    </div>
</x-layout>