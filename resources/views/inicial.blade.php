<x-layout>
  <style>
    body {
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
    }

    .agende {
      display: block;
      margin: 0;
      text-align: center;
      font-size: 20px;
      color: gold;
      background-color: #0E0073;
      border-radius: 25px;
    }
  </style>
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
  <br>
  <div>
    <pre>
      <br>
      <br>
    </pre>
  </div>
  <div class="agende">
   <ul class="myUL">
    @hasanyrole('admin|comerc')
      <li><a href="/agenda" class="agende">Agenda</a></li>
      <li><a href="/servicos" class="agende">Pacotes de Comida</a></li>
      <li><a href="/Html/Fazendinha/Fazendinha_Solicitacoes.html" class="agende">Pedidos</a></li>
    @endhasanyrole
    @role('ope')
      <li><a href="/reservas" class="agende">Lista de Festas</a></li>
    @endrole
    @role('user')
      <li><a href="/agendamento" class="agende" style="text-align: center;">Agende sua festa</a></li>
    @endrole
   </ul>
  </div> 
</x-layout>