<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AtendimentoController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/atendimentos', [AtendimentoController::class, 'index']);

Route::get('/atendimento/id/{id_atendimento}', [AtendimentoController::class, 'get']);

Route::get('/atendimentos/dia/{date}', [AtendimentoController::class, 'atendimentosDate']);

Route::get('/atendimentos/dias/{from}&{to}', [AtendimentoController::class, 'atendimentosFromTo']);

Route::get('/atendimentos/month/{month}', [AtendimentoController::class, 'atendimentosMonth']);

Route::get('/atendimentos/row/', [AtendimentoController::class, 'atendimentosRowToday']);

Route::get('/atendimentos/row/next', [AtendimentoController::class, 'atendimentosRowTodayNext']);


Route::post('/atendimento/post', [AtendimentoController::class, 'store']);


//update -> iniciar atendimento