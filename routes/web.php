<?php

use App\Http\Controllers\QuestionarioController;
use App\Http\Controllers\PerguntaController;
use App\Http\Controllers\RespostaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
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
Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');

Route::resource('questionarios', QuestionarioController::class)->middleware('auth');
Route::resource('perguntas', PerguntaController::class)->middleware('auth');
Route::resource('respostas', RespostaController::class)->middleware('auth');
Route::resource('posts', PostController::class)->middleware('auth');

route::get('dashboard',[HomeController::class,'dashboard'])->middleware('admin')->name('dashboard');
route::get('dashboard/posts',[PostController::class,'dashboard'])->middleware('admin')->name('dashboard.posts');
route::get('dashboard/questionarios',[QuestionarioController::class,'dashboard'])->middleware('admin')->name('dashboard.questionarios');
route::get('dashboard/perguntas/{id}',[PerguntaController::class,'dashboard'])->middleware('admin')->name('dashboard.perguntas');

Route::resource('questionarios', QuestionarioController::class)->only([
    'create','store','edit','update','destroy'
])->middleware('admin');

Route::resource('posts', PostController::class)->only([
    'create','store','edit','update','destroy'
])->middleware('admin');


require __DIR__.'/auth.php';