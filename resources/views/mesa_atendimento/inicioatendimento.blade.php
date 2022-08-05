@extends("layouts.mesa")

@section('content')
<div class="container2">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  </ul>
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
      <div class="col-md-9 mt-2">
        <div>
          <ul id="atendido"></ul>
        </div>
        <div>
          <ul id="addRequisitos"></ul>
        </div>
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-danger col-md-9 mx-5 mt-5" data-bs-toggle="modal" data-bs-target="#myModal">
          Encerrar Atendimento</button>

        <!-- The Modal -->
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Encerrar Atendimento</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                Voce deseja encerrar o atendimento?
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button class="btn  btn-block btn-danger" onclick="encerrarAtendimento()"><i class="fas fa-ban"></i> Encerrar</button>
              </div>
            </div>
          </div>
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
</div>
</div>

@endsection