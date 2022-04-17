<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/senha',       "App\Http\Controllers\Api\SenhaController@index");
Route::get('/atendimento', "App\Http\Controllers\Api\AtendimentoController@index");
