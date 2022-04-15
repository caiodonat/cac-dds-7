@extends('totem.layout')
@section('content')
<div>
    
    <a href="/secretaria">Secretaria</a>    
    <button title="redirecionamento p/ secretaria" class="secretaria">Secretaria</button>
    <br>
    <a href="/financeiro">Financeiro</a>
    <button class="financeiro">Financeiro</button>
    <br>
    <a href="/Pedagogico">Pedagogico</a>
    <button class="Pedagogico">Pedagogico</button>
    <br>
    <a href="/"></a>
    <button class="servicos">Outros serviços</button>
</div>
@endsection