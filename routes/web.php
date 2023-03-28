<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\AcueductoController;
use App\Http\Controllers\EquipoController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('panel', PanelController::class)
->middleware('auth');
Route::resource('acueductos', AcueductoController::class)
    ->middleware('auth');
Route::resource('equipos', EquipoController::class)
    ->middleware('auth');
Route::resource('usuarios', UsuarioController::class);
Route::resource('rol', RolController::class);
