@extends("layouts.mesa")

@section('content')
<div class="container2">
  <ul class="nav nav-tabs" id="myTab" role="tablist"></ul>
  <div>
    <h2 class="mt-5">Bem-Vindo a Mesa de Atendimento,</h2>
    <h3 class="mt-3">E necessario selecionar o guiche para entrar na Mesa de Atendimento:</h3>
    <div class="w-75">
      <div class="card">
        <div class="card-header">
          Guiche anterior: {{ Auth::user()->number_desk }}, Selecione o Guiche:
        </div>
        <div class="card-body">
          <div class="boxG p-2">
            <h5>Guichê</h5>
            <h1 class="numero" id="guicheNum">?</h1>
            <div class="alterar-box">
              <select class="form-select" id="number_desk" aria-label="Default select example">
                <option selected>Selecionar Guiche</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
              <button class=" mx-1 btn btn-light btn-sm" onclick="setGuiche()">Confirmar</button>
            </div>
          </div>
        </div>
        <button class="btn btn-primary mt-4" onclick="putServiceDesk(
        document.getElementById('number_desk').value,
        '{{ Auth::user()->id }}')">
          Confirmar Guiche Selecionado</button>
      </div>
    </div>
  </div>
</div>
</div>

@endsection