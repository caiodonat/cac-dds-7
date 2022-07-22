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
Route::get('/atendimentos/day/{day}', [AtendimentoController::class, 'day']);

//retorna todos atendimentos entre duas Datas
Route::get('/atendimentos/days/{first}&{last}', [AtendimentoController::class, 'daysFirstLast']);

//retorna todos atendimentos de um Mes expecifico
Route::get('/atendimentos/month/{month}', [AtendimentoController::class, 'monthMonth'])->name("atendimentos.month");

//retorna todos os atendimento do dia atual
Route::get('/atendimentos/queue', [AtendimentoController::class, 'queue']);

//retorna o proximo atendimento na fila do dia atual
Route::get('/atendimentos/queue/next', [AtendimentoController::class, 'queueNext']);

//Esta rota vai chamar a senha anterior caso a mesma nao tenha comparecido ao guiche
Route::get('/atendimentos/queue/already_called', [AtendimentoController::class, 'queueAlready_called']);

//retorna um atendimento especifico (do dia atual) com base na variavel 'numero_atendimento'
Route::get('atendimentos/queue/number/{numero_atendimento}', [AtendimentoController::class, 'queueNumber']);

//chama a proxima senha no telao e altera valor de status_atendimento
Route::get('/atendimentos/queue/next/to_call', [AtendimentoController::class, 'queueNextTo_call']);

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
