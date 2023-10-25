<!DOCTYPE html>
<html lang="en">

</html>

<head>
  <title>Fazenda.com</title>
  <link href="images/favicon.ico" rel="icon"  type="image/x-icon">
  <meta charset="UTF-8">
  <script src="https://unpkg.com/alpinejs" defer></script>
</head>

<body>
  <style>
    body {
        margin: 0;
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
  </style>
  <div class="topo">
      <div>
      <ul>
        @auth
          <li>
            <form class="reg" method="POST" action="/logout">
              @csrf
              <button type="submit">
                <i href="/logout" class="reg"></i>Sair
              </button>
            </form>
          </li>
          <li><p class="reg"> Bem vindo(a), {{ auth()->user()->name }}</p></li>
          <li><a href="/reservas" class="reg">Minhas Compras 🛒</a></li>
        @else
          <li><a href="/cadastro" class="reg">Registrar-se</a></li>
          <li><a href="/login" class="reg">Login</a></li>
        @endauth
          <a href="/"><img src="images/pato.png" style="float: inline-start; width:60px; height: 30px;padding: 15px; padding-top: 15px;"></a>
      </ul>
      </div>
  </div>
  <main>
    {{ $slot }}
  </main>
  <x-flash-message />
</body>

</html>