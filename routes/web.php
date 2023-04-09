<?php

use App\Http\Controllers\FormularioController;
use App\Http\Controllers\PerguntaController;
use App\Http\Controllers\RespostaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AuthenticatedSessionController::class,'create'])->middleware('guest');

Route::resource('formularios', FormularioController::class)->middleware('auth');
Route::resource('perguntas', PerguntaController::class)->middleware('auth');
Route::resource('respostas', RespostaController::class)->middleware('auth');

route::get('dashboard/formularios',[FormularioController::class,'dashboard'])->middleware('admin');

Route::resource('formularios', FormularioController::class)->only([
    'create','store','edit','update','destroy'
])->middleware('admin');

Route::resource('formularios', FormularioController::class)->only([
    'index', 'show'
])->middleware('auth');

require __DIR__.'/auth.php';