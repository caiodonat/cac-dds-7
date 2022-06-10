<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AtendimentoController;
use App\Http\Controllers\ApiGuiches;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//POST

//Esta rota vai gerar uma senha para um novo atendimento
Route::post('/atendimento/post', [AtendimentoController::class, 'createAtendimento']);


//GET

//Esta rota vai exibir todos os atendimentos realizados no dia
Route::get('/atendimentos', [AtendimentoController::class, 'index']);

//Esta rota vai buscar um atendimento realizado pelo ID
Route::get('/atendimento/id/{id_atendimento}', [AtendimentoController::class, 'get']);

//Esta rota vai exibir os atendimentos em uma data especifica
Route::get('/atendimentos/dia/{date}', [AtendimentoController::class, 'atendimentosDate']);

//Esta rota vai exibir os atendimentos realizados dentro de um periodo de tempo
Route::get('/atendimentos/dias/{from}&{to}', [AtendimentoController::class, 'atendimentosFromTo']);

//Esta rota vai exibir os atendimentos realizados em um mes especifico
Route::get('/atendimentos/month/{month}', [AtendimentoController::class, 'atendimentosMonth']);

//Esta rota vai exibir os proximos atendimentos a serem realizados
Route::get('/atendimentos/queue', [AtendimentoController::class, 'atendimentosQueueToday']);

//Esta rota vai chamar o proximo da fila que sera antendido
Route::get('/atendimento/queue_next', [AtendimentoController::class, 'atendimentosQueueTodayNext']);

//Esta rota vai chamar a senha anterior caso a mesma nao tenha comparecido ao guiche
Route::get('/atendimentos/afterQueue', [AtendimentoController::class, 'atendimentosAfterQueueToday']);

//retorna um atendimento especifico (do dia atual) com base na variavel 'numero_atendimento'
Route::get('atendimento/numero_atendimento/{numero_atendimento}', [AtendimentoController::class, 'atendimentoTodayNumber']);

//senhas a serem atendidas
Route::get('/atendimento/to_call', [AtendimentoController::class, 'ToCallNext']);

//chama a senha no telao e altera valor de status_atendimento
Route::get('/atendimento/to_call_next', [AtendimentoController::class, 'ToCallNext']);


//put/UPDATE

//inicio do atendimento
Route::put('/atendimento/begin/{id_atendimento}', [AtendimentoController::class, 'atendimentoBegin']);

//encerramento do atendimento
Route::put('/atendimento/finish/{id_atendimento}&{$estado_fim_atendimento}', [AtendimentoController::class, 'atendimentoFinish']);

//chama o uma senha especifica da fila
Route::put('/atendimento/call/{id_atendimento}', [AtendimentoController::class, 'Call']);

//chama a fila de chamada a proxima senha da fila de espera
Route::put('/atendimento/call_next', [AtendimentoController::class, 'CallNext']);



//GUICHE

Route::get('/guiches', [AtendimentoController::class, 'guiches']);

//API funcionarios;


//Route::get('/funcionarios', [ApiGuiches::class, 'funcionariosAll']);

Route::get('/funcionarios', [ApiGuiches::class, 'funcionariosAll']);
Route::post('/funcionarios', [ApiGuiches::class, 'createFuncionario']);
