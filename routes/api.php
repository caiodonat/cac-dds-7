<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AtendimentoController as Atendimento;
use App\Http\Controllers\Api\ServicosController;
use App\Http\Controllers\Api\ServiceDeskController as ServiceDesk;
use App\Http\Controllers\UserController as User;
use App\Http\Controllers\Api\ApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

  //POST

//Esta rota vai gerar uma senha para um novo atendimento
Route::post('/atendimento/post/', [Atendimento::class, 'post']);

  //GET

//retorna todos os atendimentos no DB
Route::get('/atendimentos/all', [Atendimento::class, 'all']);

//retorna um atendimento com ID expecifico 
Route::get('/atendimentos/id/{id_atendimento}', [Atendimento::class, 'id']);

//retorna todos atendimentos com DATA especifica
Route::get('/atendimentos/day/{day}', [Atendimento::class, 'day']);

//retorna todos atendimentos entre duas Datas
Route::get('/atendimentos/days/{first}&{last}', [Atendimento::class, 'daysFirstLast']);

//retorna todos atendimentos de um Mes expecifico
Route::get('/atendimentos/month/{month}', [Atendimento::class, 'monthMonth'])->name("atendimentos.month");

//retorna todos os atendimento do dia atual
Route::get('/atendimentos/queue', [Atendimento::class, 'queue']);

//retorna o proximo atendimento na fila do dia atual
Route::get('/atendimentos/queue/next', [Atendimento::class, 'queueNext']);

//Esta rota vai chamar a senha anterior caso a mesma nao tenha comparecido ao guiche
Route::get('/atendimentos/queue/already_called/', [Atendimento::class, 'queueAlready_called']);

Route::get('/atendimentos/queue/next/already_called/', [Atendimento::class, 'queueNextAlready_called']);

//retorna um atendimento especifico (do dia atual) com base na variavel 'numero_atendimento'
Route::get('atendimentos/queue/number/{numero_atendimento}', [Atendimento::class, 'queueNumber']);


  //PUT

//inicio do atendimento
Route::put('/atendimento/begin/', [Atendimento::class, 'begin']);

//encerramento do atendimento
Route::put('/atendimento/finish/', [Atendimento::class, 'finish']);

//chama o uma senha especifica da fila
Route::put('/atendimento/call/', [Atendimento::class, 'call']);

//chama a fila de chamada a proxima senha da fila de espera
Route::put('/atendimento/queue/call_next', [Atendimento::class, 'queue_callNext']);


//SERVICOS

Route::post('/servicos/post/', [ServicosController::class, 'post']);

Route::get('/servicos/id/{id}', [ServicosController::class, 'getId']);
Route::get('/servicos/pdg', [ServicosController::class, 'getPDG']);
Route::get('/servicos/fcr', [ServicosController::class, 'getFCR']);
Route::get('/servicos/sct', [ServicosController::class, 'getSCT']);
Route::get('/servicos/ots', [ServicosController::class, 'getOTS']);


//UserController

Route::put('/user/set/number_desk', [User::class, 'setNumber_desk']);