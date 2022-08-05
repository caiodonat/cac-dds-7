@extends('layouts.totem')
@section('content')
    <div class="voltar mx-5 my-5">
        <a href="{{ url('/totem/totem') }}"><img src="../img/de-volta.png" class=""></a>
    </div>


    <div class="senailogo">
        <div class="d-flex  justify-content-center  align-items-center w-100 my-5">
            <img src="../img/LOGO_LOGO.png">
        </div>


        <div class="box-title">
            <h1>PAINEL DE INFORMAÇÕES</h1>
        </div>

    </div class="box-maior">
    <div class="bordas">
        <div class="informacao">
            <h2 class="text">INFORMAÇÕES GERAIS:</h2>
            <br>
            <h3 class="text">0800 102 0880</h3>
            <h3 class="text">3334-5201</h3>
            <h3 class="text">3334-5202</h3>
            <h3 class="text">+55 (27) 98818-2941</h3>
        </div>
        <div class="infoqrcode">
            <h2>Acesse nosso site em:</h2>
        </div>
        <div class="qrcode">
            <img src="../img/qrcode400.png">
        </div>
        <div class="infoqrcode">
            <h2>
                Para receber as informações no seu aparelho, basta apontar a câmera do celular no QRCode.
            </h2>
        </div>
        <br>

    </div>
@endsection
