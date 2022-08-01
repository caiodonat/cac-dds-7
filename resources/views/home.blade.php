@extends("layouts.app")

@section('content')


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item">

              <div class="row mb-3">

                <label for="email" class="col-md-4 col-form-label text-md-end">
                  <a href="{{ url('/totem/totem') }}"><img src="../img/billboard(1).png" alt=""></label></a>

                <div class="col-md-6">
                  <h5>TOTEM</h5>
                  <p>Impressao de Senha</p>
                </div>
              </div>

            </li>

            <li class="list-group-item">

              <div class="row mb-3">

                <label for="email" class="col-md-4 col-form-label text-md-end">
                  <a href="{{ url('/mesa_atendimento/setGuiche') }}"><img src="../img/agente-de-atendimento-ao-cliente.png" alt=""></label></a>

                <div class="col-md-6">
                  <h5>MESA DE ATENDIMENTO</h5>
                  <p>Gerenciamento de Fila</p>
                </div>
              </div>

            </li>

            <li class="list-group-item">

              <div class="row mb-3">

                <label for="email" class="col-md-4 col-form-label text-md-end">
                  <a href="{{ url('/telao/telao') }}"><img src="../img/smart-tv.png" alt=""></label></a>

                <div class="col-md-6">
                  <h5>TELAO</h5>
                  <p>Chamados de Senha</p>
                </div>
              </div>

            </li>




          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection