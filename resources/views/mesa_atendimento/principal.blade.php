@extends("layouts.mesa")

@section('content')
<div class="container2">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  </ul>
  <div>
    <h1 class="mt-5">Bem-vindo - Guiche: {{ Auth::user()->number_desk }}</h1>
  </div>
  <div class="my-5">
    <h2 class="">Unidade</h2>
    <p class="">Visualize abaixo os modulos para sua unidade.</p>
  </div>
  <div class=" mt-5 icons">
    <a class="mx-5" href="{{ url('/mesa_atendimento/atendimento') }}"> <img src="../img/agente-de-call-center.png" alt=""></a>
    <a class="mx-5" href="{{ url('/mesa_atendimento/monitor') }}"><img src="../img/reporter.png" alt=""></a>
    <a class="mx-5" href="{{ url('/mesa_atendimento/triagem') }}"><img src="../img/browser.png" alt=""></a>
    <a class="mx-5" href="{{ url('/mesa_atendimento/configuracoes') }}"><img src="../img/contexto.png" alt=""></a>
  </div>
  <!-- <div>
    <p class="atendimento">Atendimento</p>
    <p class="monitor">Monitor</p>
    <p class="triagem">Triagem</p>
    <p class="config">Configuracoes</p>
  </div> -->
  </div>

@endsection
