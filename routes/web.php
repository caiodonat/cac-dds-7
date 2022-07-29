<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('inicio');
});

Route::get('/teste', function () {
   return view('teste');
});

Route::get('/carbon', function () {
    return view('carbon');
});
Route::get('testando', function () {
    return view('apenas um teste');
}) ->name('testando.aplicativo');

Route::get('telao/telao', function () {
    return view('telao.telao')->middleware('auth');
}) ->name('telao');

Route::get('totem/totem', function () {
    return view('totem.totem');
}) ->name('totem')->middleware('auth');

Route::get('/mesa_atendimento/principal', function(){
    return view('mesa_atendimento.principal');
 })->name('principal')->middleware('auth');

 Route::get('/mesa_atendimento/atendimento', function(){
    return view('mesa_atendimento.atendimento');
 })->name('atendimento')->middleware('auth');

 Route::get('/mesa_atendimento/chamadoatendimento', function(){
    return view('mesa_atendimento.chamadoatendimento');
 })->name('chamadoatendimento')->middleware('auth');

 Route::get('/mesa_atendimento/inicioatendimento', function(){
    return view('mesa_atendimento.inicioatendimento');
 })->name('inicioatendimento')->middleware('auth');

 Route::get('/mesa_atendimento/monitor', function(){
    return view('mesa_atendimento.monitor');
 })->name('monitor')->middleware('auth');

 Route::get('/mesa_atendimento/triagem', function(){
    return view('mesa_atendimento.triagem');
 })->name('triagem')->middleware('auth');

 Route::get('/mesa_atendimento/configuracoes', function(){
    return view('mesa_atendimento.configuracoes');
 })->name('configuracoes')->middleware('auth');

 Route::get('/totem/financeiro', function(){
   return view('totem.financeiro');
})->name('financeiro')->middleware('auth');

Route::get('/totem/totem', function(){
   return view('totem.totem');
})->name('inicio')->middleware('auth');

Route::get('/totem/outros', function(){
   return view('totem.outros');
})->name('outros')->middleware('auth');

Route::get('/totem/secretaria', function(){
   return view('totem.secretaria');
})->name('secretaria')->middleware('auth');

Route::get('/totem/pedagogico', function(){
   return view('totem.pedagogico');
})->name('pedagogico')->middleware('auth');

Route::get('/totem/painel', function(){
   return view('totem.painel');
})->name('painel')->middleware('auth');

Route::get('/totem/alert', function(){
   return view('totem.alert');
})->name('alert');

Auth::routes();
//test merge
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
