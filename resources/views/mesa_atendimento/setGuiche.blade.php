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
          <h1 class="numero" id="guicheNum">2</h1>
          <div class="alterar-box">
            <select class="form-select" id="number_desk" aria-label="Default select example">
              <option selected>Selecione o Guiche</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
            <button onclick="">Confirmar</button>
          </div>
        </div>
      </div>
      <button class="btn btn-primary mt-4" onclick="putServiceDesk(
        document.getElementById('number_desk').value,
        '{{ Auth::user()->id }}')">
        Begin office hour</button>
    </div>
  </div>
</div>
</div>

@endsection