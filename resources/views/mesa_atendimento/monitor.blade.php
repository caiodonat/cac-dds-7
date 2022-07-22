@extends("layouts.laymonitor")

@section('content')
<div class="container2">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  </ul>
  <div>
    <h3 class="mt-5">MONITOR</h3>
  </div>
  <div class="mt-5">
    <h3>Buscar Senha</h3>
  </div>
  <div class="input-group w-75">
    <input type="date" id="data-atendimento" class="form-control rounded w-75" placeholder="Buscar senha" aria-label="Search" aria-describedby="search-addon" />
    <button type="button" id="btn-buscar" class="btn btn-outline-success"><i class="fa fa-search fa-fw"></i> Buscar</button>
  </div>
  <div class="my-5">
    <div id="progresso" class="p-2"></div>

    <h4>Minha fila (todos):</h4>
    <ul class="list-group w-75" id="fila-espera" >
      <li class="list-group-item">Clique no botão listar para obter a lista de atendimento do dia...</li>
    </ul>
  </div>
  </div>

  @endsection
