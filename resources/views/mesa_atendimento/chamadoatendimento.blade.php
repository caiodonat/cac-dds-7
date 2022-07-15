@extends("layouts.app")

@section('content')
<div class="container2">
<ul class="nav nav-tabs" id="myTab" role="tablist"></ul>
  <div>
    <h3 class="mt-5">ATENDIMENTO</h3>
    <p class="mb-5">Efetue os atendimentos às senhas distribuidas dos servicos que voce atende</p>
    <div class="row">

      <div class="col-md-3">

        <div class="boxG p-2">
          <h5>Guichê</h5>
          <h1 class="numero" id="guiche">2</h1>
        </div>
      </div>
      <div class="tabelaProx">
        <ul id="proximo"></ul>
        <button class="btn btn-block btn-atd" onclick="myFunction()"><i class="fas  fa-bullhorn fa-fw"></i> Chamar
          Novamente</button>
        <button class="btn  btn-block btn-atd" onclick="iniciarAtendimento()"><i class="fas fa-play fa-fw"></i> Iniciar
          Atendimento </button>
        <button class="btn  btn-block btn-atd" onclick="encerrarAtendimento()"><i class="fas fa-ban"></i> Nao
          Compareceu</button>

      </div>

    </div>

    <div class="my-5">
      <h4>Minha fila (todos):</h4>
      <ul id="fila_espera">
      </ul>
    </div>
  </div>
  </div>
@endsection
