@extends("layouts.mesa")

@section('content')

<div class="container2">
  <h2 class="mt-5">Bem-Vindo a Mesa de Atendimento,</h2>
  <h3 class="mt-3">Selecione o guiche desejado:</h3>
  <div class="w-75">
    <div class="card">
      <div class="card-header">
        Featured
      </div>
      <div class="card-body">
        <div class="boxG p-2">
          <h5>Guichê</h5>
          <h1 class="numero" id="guiche">2</h1>
          <div class="alterar-box">
          </div>
          <div class="col-md-6">
            <select class="form-select" id="select-setor" aria-label="Default select example">
              <option selected>Selecione seu Perfil</option>
              <option value="adm">Administrador</option>
              <option value="fc">Funcionario</option>
              <option value="vst">Visitante</option>
            </select>
          </div>
        </div>
      </div>
      <a href="#" class="btn btn-primary mt-4">Go somewhere</a>
    </div>
  </div>
</div>
</div>

@endsection