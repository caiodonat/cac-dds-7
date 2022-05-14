<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AtendimentoController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/atendimentos', [AtendimentoController::class, 'index']);

Route::get('/atendimento/id/{id_atendimento}', [AtendimentoController::class, 'get']);

Route::post('/atendimento/post', [AtendimentoController::class, 'store']);

//Route::get('/atendimentos/hoje', [AtendimentoController::class, 'atendimentoDia']);

Route::get('/atendimento/dia/{date}', [AtendimentoController::class, 'atendimentosDate']);
Route::get('/atendimento/dias/from={from}&to={to}', [AtendimentoController::class, 'atendimentosFromTo']);