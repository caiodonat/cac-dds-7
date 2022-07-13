@extends("layouts.app")

@section('content')
<div class="container2">
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="/index.html" role="tab" aria-controls="home"
        aria-selected="true"><img src="https://senaies.com.br/wp-content/uploads/2019/11/logo_senai_novo.svg"
          alt="Senai - ES" class="logo-img" style="height: 32px"></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="/views/atendimento.html" role="tab" aria-controls="profile"
        aria-selected="false">Atendimento</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="/views/monitor.html" role="tab" aria-controls="contact"
        aria-selected="false">Monitor</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="/views/triagem.html" role="tab" aria-controls="contact"
        aria-selected="false">Triagem</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="/views/configuracao.html" role="tab" aria-controls="contact"
        aria-selected="false">Configuracao</a>
    </li>
  </ul>
  <div>
    <h3 class="mt-5">MONITOR</h3>
  </div>
  <div class="text-center mt-5 ">
    <h3>Buscar Senha</h3>
  </div>
  <div class="input-group">
    <input type="date" id="data-atendimento" class="form-control rounded w-75" placeholder="Buscar senha" aria-label="Search" aria-describedby="search-addon" />
    <button type="button" id="btn-buscar" class="btn btn-outline-success"><i class="fa fa-search fa-fw"></i> Buscar</button>
  </div>
  <div class="my-5">
    <div id="progresso" class="p-2"></div>

    <h4>Minha fila (todos):</h4>
    <ul class="list-group" id="fila-espera" >
      <li class="list-group-item">Clique no botão listar para obter a lista de atendimento do dia...</li>
    </ul>
  </div>
  </div>

  @endsection
