@extends("layouts.laytriagem")

@section('content')
<div class="container2">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  </ul>
  <div>
    <h3 class="mt-5">TRIAGEM</h3>
  </div>
  <div class="input-group w-75">
    <input type="search" id="buscar-triagem" class="form-control rounded" placeholder="Buscar senha" aria-label="Search" aria-describedby="search-addon" />
    <button type="button" id="btn-buscar-triagem" class="btn btn-outline-success" ><i class="fa fa-search fa-fw"></i> Buscar</button>
  </div>
  <br>
  <div>
   <ul id="requerimento"></ul>
  </div>
  <br>
  <form>
    <div class="form-row" id="triagem-add"></div>
    </div>
  </form>
  </div>
  @endsection
