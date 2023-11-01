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
      display: inline-block;
      margin: 5px;
      text-align: center;
      font-size: 20px;
      color: gold;
      background-color: #0E0073;
      border-radius: 25px;
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
  <div class="agende">
    @hasanyrole('admin|comerc')
    <ul class="myUL">
      <li><a href="/Html/Fazendinha/Fazendinha_Agenda.html" class="agende">Agenda</a></li>
      <li><a href="/Html/Fazendinha/Fazendinha_Comida.html" class="agende">Pacotes de Comida</a></li>
      <li><a href="/Html/Fazendinha/Fazendinha_Solicitacoes.html" class="agende">Pedidos</a></li>
    </ul>
    @endhasanyrole
    @role('ope')
    <ul class="myUL">
      <li><a href="/Html/Fazendinha/Fazendinha_Lista.html" class="agende">Lista de Festas</a></li>
    </ul>
    @endrole
    @unlessrole('admin|comerc|ope')
    <ul class="myUL">
      <li><a href="/agendamento" class="agende" style="text-align: center;">Agende sua festa</a></li>
    </ul>
    @endunlessrole
  </div> 
</x-layout>