<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/mesa.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/telao.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mesa.css') }}" rel="stylesheet">
</head>

<script>

function servicoFinanceiro(){
    servicos = document.getElementById("opcoesFcr2");
    servicos.innerHTML = "hi";

    const uri = `https://central-atendimento-cliente.herokuapp.com/api/servicos/fcr`
    resp = fetch(uri)
    .then(r =>r.json().then(r =>{
                if(r.success){
                    r.r.forEach(r1 => {
                        servicos.innerHTML += `
                            <div class="box-opt">
                                <label for="opt1" id="">
                                    <input type="checkbox" class="messageCheckbox" value="${r1.id_atendimento}" name="opt" id="">
                                    ${r1.servico}
                                </label>
                            </div>
                        `
                    });
                }else{
                    console.log("falha -> " + r.r[0]);
                }
        })
    )
}
</script>

<body onload="servicoFinanceiro();">
    <p>hi</p>
    <div id="opcoesFcr2">

    </div>
</body>