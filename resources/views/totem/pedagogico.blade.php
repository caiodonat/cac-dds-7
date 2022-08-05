@extends('layouts.totempedagogico')
@section('content')
    <div class="logo_senai">
        <div class="voltar mx-5 my-5">
            <a href="{{ url('/totem/totem') }}"><img src="../img/de-volta.png" class=""></a>
        </div>

        <div class="d-flex  justify-content-center  align-items-center w-100 my-5">
            <img src="../img/LOGO_LOGO.png" alt="logo_logo.png">
        </div>

        <div class="setor">
            <h1>Pedagógico</h1>
            <p class="md-5">Selecione os serviços desejados:</p>

        </div>
        <br>
        <div class="box">

            <div id="opcoesPdg">
                <div class="box-opt">
                    <label for="opt1" id="">
                        <input type="checkbox" value="opcao1" name="opt" id="">
                    </label>
                </div>
            </div>


            <!-- <div class="box-btns"> -->
            <!-- <button class="btn btn-primary" id="emitir-senha">Emitir Senha</button> -->
            <!-- </div> -->

        </div>


    </div>
    <br>

    <input type="numeric" id="campo-texto" class="field_cpf" placeholder="CPF (Opcional)" aria-label="Search"
        aria-describedby="search-addon" minlength="11" maxlength="11" />
    <button id='getData' class="btn-emitirsenha" onclick="EmitirSenha(optionsChecked()); optionsChecked();">Emitir
        Senha</button>

    </div>
@endsection
