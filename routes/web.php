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
    return view('welcome');
});

Route::get('/carbon', function () {
    return view('carbon');
});

Route::get('testando', function () {
    return view('apenas um teste');
}) ->name('testando.aplicativo');

Route::get('telao', function () {
    return view('telao.telao');
}) ->name('telao');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();