<!DOCTYPE html>
<html lang="pt-BR">
    <title>Financeiro</title>
</head>

<div class="container">
    <div class="senai-logo">
        <div class="voltar mx-5 my-5">
            <a href="../index.html"><img src="../img/de-volta.png" class=""></a>
        </div>

        <div class="d-flex  justify-content-center  align-items-center w-100 my-5">
            <img src="../img/logo_senai_novo.svg" alt="">
        </div>

        <div class="setor">
            <h1>FINANCEIRO</h1>
            <p class="md-5">Selecione os serviços desejados:</p>

        </div>
        <br>
        <div class="box">

            <div id="opcoesFcr">
            <div class="qwe">
                <!-- innerHTML.options -->
            </div>
             </div>
            <!-- <div class="box-btns"> -->
           <!-- <button class="btn btn-primary" id="emitir-senha" onclick="callAlert()">teste</button> -->
            <!-- </div> -->
        </div>
    </div>
    <br>

    <input type="text" id="campo-texto" class="field_cpf" placeholder="CPF (Opcional)" aria-label="Search"
        aria-describedby="search-addon" />
    <button id='getData' class="btn-emitirsenha" onclick="
    EmitirSenha(
        //document.getElementById(campo-texto),
        optionsChecked()
    );
    ">Emitir Senha</button>
    </div>
</div>

</html>