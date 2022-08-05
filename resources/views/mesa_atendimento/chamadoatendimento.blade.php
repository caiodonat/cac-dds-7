@extends("layouts.mesa")

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
          <h1 class="numero" id="guiche" value={{ Auth::user()->number_desk }}>{{ Auth::user()->number_desk }}</h1>
        </div>
      </div>
      <div class="tabelaProx" style="height: 100px;">
        <ul id="proximo"></ul>
        <button class="btn btn-block btn-atd" onclick="chamarSenha()"><i class="fas  fa-bullhorn fa-fw"></i> Chamar
          Novamente</button>
        <button class="btn  btn-block btn-atd" onclick="iniciarAtendimento()"><i class="fas fa-play fa-fw"></i> Iniciar
          Atendimento </button>
        <button class="btn  btn-block btn-atd" onclick="encerrarAtendimento()"><i class="fas fa-ban"></i> Nao
          Compareceu</button>

      </div>

    </div>

    <div class="my-5">
      <h4>Senhas atual:</h4>
      <table class="w-75 table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Senha</th>
            <th scope="col">Servico</th>
          </tr>
        </thead>
        <tbody id="table_current_senha">
          <!-- input here -->
        </tbody>
      </table>
    </div>
    
    <div class="my-5">
      <h4>Fila de Senhas:</h4>
      <table class="w-75 table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Senha</th>
            <th scope="col">Servico</th>
          </tr>
        </thead>
        <tbody id="table_espera">
          <!-- input here -->
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection