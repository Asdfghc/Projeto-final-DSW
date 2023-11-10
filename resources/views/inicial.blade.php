<x-layout>
  <style>
    body {
      @unlessrole('admin|comerc|ope')
      background-image: url('images/fazenda.png');
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      margin: 0;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      box-shadow: 0 0 250px rgba(0,0,0,0.9) inset;
      @endunlessrole
      @hasanyrole('admin|comerc|ope')
      background-image: none;
      background-color: antiquewhite;
      @endhasanyrole
    }

    .nome {
      font-size: 45px;
      position: absolute;
      top: 30%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .placa {
      position: relative;
      text-align: center;
      color: white;
    }

    .nuvens {
      position: relative;
      text-align: center;
      color: black;
    }

    .nuvem1 {
      position: absolute;
      top: 53%;
      left: 42%;
      transform: translate(-50%, -50%);
      font-size: 20px;
    }

    .nuvem2 {
      position: absolute;
      top: 53%;
      left: 76.6%;
      transform: translate(-50%, -50%);
      font-size: 20px;
    }

    .comida {
      position: absolute;
      text-align: center;
    }

    ul.myUL {
      display: inline-block;
      position: absolute;
      top: 80%;
      left: 50%;
      transform: translate(-50%, -50%);
      @hasanyrole('admin|comerc|ope')
      display: inline-block;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      @endhasanyrole
    }

    .agende {
      display: block;
      margin: 5;
      text-align: center;
      font-size: 20px;
      color: gold;
      background-color: #0E0073;
      border-radius: 25px;
    }
    ul.myUL2 {
      display: inline-block;
      position: absolute;
      top: 60%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  </style>
  @unlessrole('admin|comerc|ope')
  <br>
  <div class="placa">
    <img src="images/placa.png" alt="placa">
    <div class="nome">
      Fazendinha Feliz<br>Buffet e Festas
    </div>
    <div>
      <pre>
        <br>
        <br>
        <br>
      </pre>
    </div>
  </div>
  <div class="nuvens">
    <img src="images/salgados.png" style="border: solid 6px #478ac9;width: 325px; height: 195px;">
    <img src="images/nuvem.png" style="width: 325px; height: 195px;">
    <div class="nuvem1">Salgados Maravilhosos!</div>
    <img src="images/doces.jpg" style="border: solid 6px #478ac9 ;width: 325px; height: 195px;">
    <img src="images/nuvem.png" style="width: 325px; height: 195px;">
    <div class="nuvem2">Verdadeiros Doces <br> de uma Fazenda!</div>
  </div>
  @endunlessrole
  <br>
  <div>
    <pre>
      <br>
      <br>
    </pre>
  </div>
  <div>
    <ul class="myUL">
    @hasanyrole('admin|comerc')
      <li><a href="/agenda" role="button" class="botao">Agenda</a></li>
      <li><a href="/recomendacoes" role="button" class="botao">Alterar recomendações pré-festa</a></li>
      <li><a href="/servicos" role="button" class="botao">Pacotes de Comida</a></li>
      <li><a href="/reservas" role="button" class="botao">Pedidos</a></li>
    @endhasanyrole
    @unlessrole('admin|ope|comerc')
      <li><a href="/agendamento" role="button" class="botao">Agende sua festa</a></li>
    @endunlessrole
    @role('ope')
      <li><a href="/reservas" role="button" class="botao">Lista de Festas</a></li>
    @endrole
    @role('user')
      <li><a href="/pesquisa" role="button" class="botao">Pesquisa de satisfação</a></li>
    @endrole
    </ul>
    <ul>
    <ul class="myUL2">
    @role('admin')
      <li><a href="/pesquisa/index" role="button" class="botao">Resultados das pesquisas de Satisfação</a></li>
    @endrole
    </ul>
  </div> 
</x-layout>