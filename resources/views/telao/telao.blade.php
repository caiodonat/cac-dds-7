@extends('layouts.telao')

@section('content')

    <body>
        <div>
            <div>
                <header class="cabecalho">
                    <a href="{{ url('/home') }}"> <img class="cabecalho-img" src="/img/LOGO_LOGO.png" alt="logo_senai"></a>
                </header>
                <main>
                    <section class="senha-guiche">
                        <h1 class="senha" onclick="refreshQueue()"><strong>SENHA</strong>
                            <h1 class="guiche"><strong>GUICHÊ</strong>
                    </section>
                    <div class="tabela-azul">
                        <header class="vertical-line-2"></header>
                        <h1 id="senhaAtual" class="senhaTelao">M-08</a>
                            <h1 id="guicheAtual" class="guicheTelao" id="nmrGuiche">02</a>
                    </div>
                    <div>
                        <h1 class="hora" id="hora"></h1>
                        <h1 class="data" id="data"></h1>
                        <table class="primeiro-numero" id="primeiroFila">
                            <tr>
                                <th class="tabela-1">SENHAS ANTERIORES</th>
                                <th class="tabela-1">GUICHÊ</strong></th>
                                <h1 id="data"></h1>
                            </tr>
                        </table>
                    </div>
            </div>
            </main>
        </div>
        </div>
    </body>
@endsection
