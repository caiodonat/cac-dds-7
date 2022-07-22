@extends("layouts.totem")
@section('content')

<div class=container>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">SENHA IMPRESSA!</h4>
        <p>Sua senha foi impressa, aguarde até ser chamado por um de nossos atendentes.
        <hr>
        <a href="{{ url('/totem/totem') }}"><button type="button" class="btn btn-success">OK</button></a>
      </div>
</div>

@endsection