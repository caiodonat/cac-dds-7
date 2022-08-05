@extends("layouts.mesa")

@section('content')

<div class="container2">
  <ul class="nav nav-tabs" id="myTab" role="tablist"></ul>
  <div>
    <h3 class=" mt-5" onclick="tt2()">ATENDIMENTO</h3>
    <p class="mb-5">Efetue os atendimentos às senhas distribuidas dos servicos que voce atende</p>
    <div class="row">

      <div class="col-md-3">

        <div class="boxG p-2">
          <h5>Guichê</h5>
          <h1 class="numero" id="guiche">{{ Auth::user()->number_desk }}</h1>
          <div class="alterar-box">
          </div>

        </div>

      </div>

      <div class="col-md-9 mt-2">

        <button class="btn-block btn-chamar" onclick="callNext()"><i class="fas  fa-bullhorn fa-fw"></i> Chamar próximo</button>
      </div>

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