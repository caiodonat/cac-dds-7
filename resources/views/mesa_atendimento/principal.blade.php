@extends("layouts.app")

@section('content')
<div class="container2">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  </ul>
  <div>
    <h1 class="mt-5">Bem-vindo</h1>
  </div>
  <div class="my-5">
    <h2 class="">Unidade</h2>
    <p class="">Visualize abaixo os modulos para sua unidade.</p>
  </div>
  <!-- <div class=" mt-5 icons">
    <a class="mx-5" href="../views/atendimento.html"> <img src="/css/imagens/agente-de-call-center.png" alt="">atd</a>
    <a class="mx-5" href="/views/monitor.html"><img src="/css/imagens/reporter.png" alt="">mon</a>
    <a class="mx-5" href="/views/triagem.html"><img src="/css/imagens/browser.png" alt="">tri</a>
    <a class="mx-5" href="/views/configuracao.html"><img src="/css/imagens/contexto.png" alt="">conf</a>
  </div> -->
  <div>
  <a href="{{ url('/mesa_atendimento/atendimento') }}">Atendimento</a>
  </div>
  <div>
    <p class="atendimento">Atendimento</p>
    <p class="monitor">Monitor</p>
    <p class="triagem">Triagem</p>
    <p class="config">Configuracoes</p>
  </div>
  </div>


@endsection
