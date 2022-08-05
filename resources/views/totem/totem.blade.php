@extends('layouts.totem')
@section('content')
    <div class="home-column">
        <img src="/img/LOGO_LOGO.png">
    </div>

    <section class="home">
        <div class="home-column">
            <a href="{{ url('/totem/financeiro') }}"><button class="pedagogico padding-button">Financeiro</button></a>
        </div>
        <div class="home-column">
            <a href="{{ url('/totem/pedagogico') }}"><button class="pedagogico padding-button">Pedagógico</button></a>
        </div>
        <div class="home-column">
            <a href="{{ url('/totem/secretaria') }}"><button class="secretaria padding-button">Secretaria</button></a>
        </div>
        <div class="home-column">
            <a href="{{ url('/totem/outros') }}"><button class="outros padding-button">Outros Serviços</button></a>
        </div>
        <div class="home-column">
            <a href="{{ url('/totem/painel') }}"><button class="painel padding-button">Painel Informativo</button></a>
        </div>
    </section>
    </body>

    </html>
@endsection
