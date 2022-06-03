<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AtendimentoController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//POST

Route::post('/atendimento/post', [AtendimentoController::class, 'createAtendimento']);


//GET

Route::get('/atendimentos', [AtendimentoController::class, 'index']);

Route::get('/atendimento/id/{id_atendimento}', [AtendimentoController::class, 'get']);

Route::get('/atendimentos/dia/{date}', [AtendimentoController::class, 'atendimentosDate']);

Route::get('/atendimentos/dias/{from}&{to}', [AtendimentoController::class, 'atendimentosFromTo']);

Route::get('/atendimentos/month/{month}', [AtendimentoController::class, 'atendimentosMonth']);

Route::get('/atendimentos/queue/', [AtendimentoController::class, 'atendimentosQueueToday']);

Route::get('/atendimento/queue/next', [AtendimentoController::class, 'atendimentosQueueTodayNext']);

Route::get('/atendimentos/afterQueue/', [AtendimentoController::class, 'atendimentosAfterQueueToday']);

Route::get('atendimento/call/{id_atendimento}', [AtendimentoController::class, 'atendimentoCall']);

//retorna um atendimento especifico (do dia atual) com base na variavel 'numero_atendimento'
Route::get('atendimento/numero_atendimento/{numero_atendimento}', [AtendimentoController::class, 'atendimentoTodayNumber']);


//put/UPDATE

//iniciar atendimento
Route::put('/atendimento/begin/{id_atendimento}', [AtendimentoController::class, 'atendimentoBegin']);

//finalizar atendimento
Route::put('/atendimento/finish/{id_atendimento}&{$estado_fim_atendimento}', [AtendimentoController::class, 'atendimentoFinish']);