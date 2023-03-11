<?php

use App\Http\Controllers\FormularioController;
use App\Http\Controllers\InputController;
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

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth')->name('welcome');

Route::get('/',[AuthenticatedSessionController::class,'create'])->middleware('guest');

Route::resource('formularios', FormularioController::class)->middleware('auth');
Route::resource('inputs', InputController::class)->middleware('auth');

require __DIR__.'/auth.php';