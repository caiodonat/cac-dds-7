@extends("layouts.layconfig")

@section('content')
<div class="container2">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  </ul>
  <div>
    <h3 class="mt-5">CONFIGURACOES</h3>
  </div>
  <div class="card-body">
    Módulo para modificar os serviços dos determinados setores.
  </div>
  <div>
    <select class="form-select w-75" id="select-setor" aria-label="Default select example">
      <option selected>Selecione o Setor</option>
      <option value="fcr">Financeiro</option>
      <option value="pdg">Pedagógico</option>
      <option value="sct">Secretaria</option>
      <option value="ots">Outros Serviços</option>
    </select>
    <button type="button" id="btn-config" class="btn mt-4 btn-primary btn-lg" onclick="selecionarSetor(document.getElementById('select-setor').value)">Buscar</button>
  </div>
  <br>
  <div>
    <ul class="list-group-item w-75" id="servicos-setores"></ul>
  </div>
  <div id="post-config">
  </div>
  <div class="w-75">
    <div id="add"></div>
      <!--inner here-->
  </div>
</div>
@endsection