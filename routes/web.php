<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Consulta;
use App\Http\Controllers\SenhaController;

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
