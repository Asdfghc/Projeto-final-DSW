<!DOCTYPE html>
<html lang="en">

</html>

<head>
  <title>Fazenda.com</title>
  <link href="images/favicon.ico" rel="icon"  type="image/x-icon">
  <meta charset="UTF-8">
  <script src="https://unpkg.com/alpinejs" defer></script>
  <script type="text/javascript" src='https://cdn.tiny.cloud/1/2b8foqu3g5757fekw52v9slhmcpo233ogz0xxptldzo29bdi/tinymce/6/tinymce.min.js'></script>
</head>

<body>
  <style>
    @font-face{
        font-family: 'Renogare-Regular';
        src: url({{asset('fonts/Renogare-Regular.ttf')}});
    }

    body {
        font-family: 'Renogare-Regular';
        margin: 0;
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
        font-size: 20px;
    }
    .botao{
        font-family: 'Renogare-Regular';
        background-color: #0E0073;
        border: none;
        border-radius: 25px;
        color: gold;
        padding: 16px 32px;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
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

    select{
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
    input[type=time]:focus {
        background-color: #C1B0F0;
    }
    input[type=date]:focus {
        background-color: #C1B0F0;
    }
    
    input[type=email]:focus {
        background-color: #C1B0F0;
    }

    input[type=password]:focus {
        background-color: #C1B0F0;
    }

    input[type=number]:focus {
        background-color: #C1B0F0;
    }

    select:focus{
        background-color: #C1B0F0;
    }

    textarea:focus{
        background-color: #C1B0F0;
    }

    textarea{
        resize: none;
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

    .topo {
      width: 100%;
      margin: 0;
      font-size: 30px;
      color: white;
      background-color: #003C74;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
    }

    li {
      display: block;
      float: right;
    }

    li a {
      display: block;
      color: gold;
      text-align: center;
      padding: 16px;
      text-decoration: none;
    }

    li a:hover {
      background-color: #0E0073;
      color: white;
    }

    a:hover{
      background-color: #0E0073;
      color: white;
    }

    .sair{
      font-family: 'Renogare-Regular';
      text-decoration: none;
      display: inline-block;
      background-color: #003C74;
      color: gold;
      font-size: 25px;
      padding: 20px 15px;
      border: none;
    }

    table, th, td {
      border: 1px solid black;
      margin-left: auto;
      margin-right: auto;
    }

    th, td {
      background-color: #eee7f7;
      text-align: center;
      font-size: 25px;
    }
  </style>
  <div class="topo">
      <div>
        <ul>
          @auth
          <form method="POST" action="/logout" style="float:inline-end;">
          @csrf
            @hasanyrole('admin|comerc|ope|user')
            <button href="/logout" class="sair">Sair</button>
            @endhasanyrole
          </form>
          @unlessrole('admin|comerc|ope')
          <li><a href="/reservas">Minhas Compras</a></li>
          @endunless
          <li style="padding: 15px; padding-top: 15px;">Bem vindo(a), {{ auth()->user()->name }}</li>
          @else
            <li><a href="/cadastro">Registrar-se</a></li>
            <li><a href="/login">Login</a></li>
          @endauth
          <a href="/"><img src="{{ asset('images/pato.png') }}" style="float: inline-start; width:60px; height: 30px;padding: 15px; padding-top: 15px;"></a>
        </ul>
      </div>
  </div>
  <main>
    {{ $slot }}
  </main>
  <x-flash-message />
</body>

</html>