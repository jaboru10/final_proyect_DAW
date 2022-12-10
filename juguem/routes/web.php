<?php

use App\Http\Controllers\DeporteController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\PistaController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth/login');
});
Auth::routes();
Route::resource('/deporte', DeporteController::class );
Route::resource('/localidad', LocalidadController::class );
Route::resource('/pista', PistaController::class );
Route::resource('/partida', PartidaController::class );
Route::resource('/user', UserController::class );
Route::get('register/localidades', [RegisterController::class, 'returnLocalidades'])->name('ajaxRequest');;
Route::post('register/localidades', [RegisterController::class, 'returnLocalidades']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
