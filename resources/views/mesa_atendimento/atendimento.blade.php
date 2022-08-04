@extends("layouts.mesa")

@section('content')

<!-- <script>
  function tt2(){
  window.userID =  {{ Auth::user()->number_desk }};
  var phpVar = window.userID
  console.log(phpVar);
  }
</script> -->

<div class="container2">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  </ul>
  <div>
    <h3 class=" mt-5">ATENDIMENTO</h3>
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
        <button class="btn-block btn-chamar" onclick="chamarTela(); salvarID()"><i class="fas  fa-bullhorn fa-fw"></i> Chamar próximo</button>
      </div>

    </div>

    <div class="my-5">
      <h4>Minha fila (todos):</h4>
      <ul class="w-75" id="fila_espera">
      </ul>
    </div>
  </div>
  </div>
  @endsection
