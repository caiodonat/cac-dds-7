<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AtendimentoController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/atendimento', [AtendimentoController::class, 'index']);

Route::get('/atendimento/{id_atendimento}', [AtendimentoController::class, 'get']);


