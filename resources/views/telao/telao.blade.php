@extends("layouts.telao")

@section('content')
<script>
  function callNext1() {
    const url = endPoint_local + `api/atendimentos/queue/next/already_called/`

    last_atendimento = 0;

    fetch(url, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json'
        },
        //body: JSON.stringify({})
      })
      .then(r => r.json().then(r => {
        if (r.success) {
          if (last_atendimento == r.r.id_atendimento) {} else {
            last_atendimento = r.r.id_atendimento;

            call = document.getElementById("senhaAtual");
            call.innerHTML = "";

            call.innerHTML += `<a id="senhaAtual" class="senhaTelao">${r.r.numero_atendimento}-${r.r.sufixo_atendimento}</a>`
          }
        }
      }))
  }

  setInterval('callNext1()', 1000);
</script>

<body>

  <div>
    <div>
      <header class="cabecalho">
        <a href="{{ url('/home') }}"> <img class="cabecalho-img" src="/img/logo_senai_branco.png" alt="logo_senai"></a>
      </header>
      <main>
        <section class="senha-guiche">
          <h1 class="senha" onclick="callNext1()"><strong>SENHA</strong>
            <h1 class="guiche"><strong>GUICHÊ</strong>
        </section>
        <div class="tabela-azul">
          <header class="vertical-line-2"></header>
          <h1 id="senhaAtual" class="senhaTelao">M-08</a>
            <h1 class="guicheTelao" id="nmrGuiche">02</a>
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