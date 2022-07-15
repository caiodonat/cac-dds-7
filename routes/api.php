<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AtendimentoController;
use App\Http\Controllers\Api\ServicosController;
use App\Http\Controllers\Api\ApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//POST

//Esta rota vai gerar uma senha para um novo atendimento
Route::post('/atendimento/post', [AtendimentoController::class, 'createAtendimento']);


//GET

//retorna todos os atendimentos no DB
Route::get('/atendimentos/all', [AtendimentoController::class, 'all']);

//retorna um atendimento com ID expecifico 
Route::get('/atendimentos/id/{id_atendimento}', [AtendimentoController::class, 'id']);

//retorna todos atendimentos com DATA especifica
Route::get('/atendimentos/day/{date}', [AtendimentoController::class, 'day']);

//Esta rota vai exibir os atendimentos realizados dentro de um periodo de tempo
Route::get('/atendimentos/dias/{from}&{to}', [AtendimentoController::class, 'diaFromTo']);

//Esta rota vai exibir os atendimentos realizados em um mes especifico
Route::get('/atendimentos/month/{month}', [AtendimentoController::class, 'atendimentosMonth'])->name("atendimento.do.mes");

//Esta rota vai exibir os proximos atendimentos a serem realizados
Route::get('/atendimentos/queue', [AtendimentoController::class, 'atendimentosQueueToday']);

//Esta rota vai chamar o proximo da fila que sera antendido
Route::get('/atendimento/queue_next', [AtendimentoController::class, 'atendimentosQueueTodayNext']);

//Esta rota vai chamar a senha anterior caso a mesma nao tenha comparecido ao guiche
Route::get('/atendimentos/afterQueue', [AtendimentoController::class, 'atendimentosAfterQueueToday']);

//retorna um atendimento especifico (do dia atual) com base na variavel 'numero_atendimento'
Route::get('atendimento/numero_atendimento/{numero_atendimento}', [AtendimentoController::class, 'atendimentoTodayNumber']);

//chama a proxima senha no telao e altera valor de status_atendimento
Route::get('/atendimento/to_call_next', [AtendimentoController::class, 'toCallNext']);

//PUT

//inicio do atendimento
Route::put('/atendimento/begin/{id_atendimento}', [AtendimentoController::class, 'atendimentoBegin']);

//encerramento do atendimento
Route::put('/atendimento/finish/{id_atendimento}&{$estado_fim_atendimento}', [AtendimentoController::class, 'atendimentoFinish']);

//chama o uma senha especifica da fila
Route::put('/atendimento/call/{id_atendimento}', [AtendimentoController::class, 'call']);

//chama a fila de chamada a proxima senha da fila de espera
Route::put('/atendimento/call_next', [AtendimentoController::class, 'callNext']);


//SERVICOS

Route::post('/servicos/post/{setor}&{servico}', [ServicosController::class, 'postServico']);

Route::get('/servicos/pdg', [ServicosController::class, 'getPDG']);
Route::get('/servicos/fcr', [ServicosController::class, 'getFCR']);
Route::get('/servicos/sct', [ServicosController::class, 'getSCT']);
Route::get('/servicos/ots', [ServicosController::class, 'getOTS']);
