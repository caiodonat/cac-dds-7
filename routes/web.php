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
})->name('testando.aplicativo');

Route::get('telao/telao', function () {
  return view('telao.telao');
})->name('telao');

Route::get('totem/totem', function () {
  return view('totem.totem');
})->name('totem');

Route::get('/mesa_atendimento/setGuiche', function () {
  return view('mesa_atendimento.setGuiche');
})->name('setGuiche');

Route::get('/mesa_atendimento/principal', function () {
  return view('mesa_atendimento.principal');
})->name('principal');

Route::get('/mesa_atendimento/atendimento', function () {
  return view('mesa_atendimento.atendimento');
})->name('atendimento');

Route::get('/mesa_atendimento/chamadoatendimento', function () {
  return view('mesa_atendimento.chamadoatendimento');
})->name('chamadoatendimento');

Route::get('/mesa_atendimento/inicioatendimento', function () {
  return view('mesa_atendimento.inicioatendimento');
})->name('inicioatendimento');

Route::get('/mesa_atendimento/monitor', function () {
  return view('mesa_atendimento.monitor');
})->name('monitor');

Route::get('/mesa_atendimento/triagem', function () {
  return view('mesa_atendimento.triagem');
})->name('triagem');

Route::get('/mesa_atendimento/configuracoes', function () {
  return view('mesa_atendimento.configuracoes');
})->name('configuracoes');

Route::get('/totem/financeiro', function () {
  return view('totem.financeiro');
})->name('financeiro');

Route::get('/totem/totem', function () {
  return view('totem.totem');
})->name('inicio');

Route::get('/totem/outros', function () {
  return view('totem.outros');
})->name('outros');

Route::get('/totem/secretaria', function () {
  return view('totem.secretaria');
})->name('secretaria');

Route::get('/totem/pedagogico', function () {
  return view('totem.pedagogico');
})->name('pedagogico');

Route::get('/totem/painel', function () {
  return view('totem.painel');
})->name('painel');

Route::get('/totem/alert', function () {
  return view('totem.alert');
})->name('alert');

Route::get('/totem/errorAlert', function () {
  return view('totem.errorAlert');
})->name('errorAlert');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
