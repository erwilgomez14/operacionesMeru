<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\AcueductoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\SistemaController;
use \App\Http\Controllers\UbicacionPlantaController;
use \App\Http\Controllers\OrdenTrabajoController;
use \App\Http\Controllers\MantenimientoPreventivoController;

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
Route::prefix('panel')->group(function () {
    Route::resource('', PanelController::class);
    Route::get('/mantenimientopreventivo/pdf', [MantenimientoPreventivoController::class, 'pdf'])->name('mantenimientopreventivo.pdf');
    Route::resource('mantenimientopreventivo', MantenimientoPreventivoController::class);
    Route::get('/mantenimientopreventivo/hasOrden', [MantenimientoPreventivoController::class, 'hasOrden']);

})->middleware('auth');
Route::prefix('activos')->group(function () {
    Route::resource('acueductos', AcueductoController::class)->middleware('rol:gerente,super-usuario');
    Route::resource('equipos', EquipoController::class);
    Route::resource('sistemas', SistemaController::class);
    Route::resource('ubiplanta', UbicacionPlantaController::class);

})->middleware('auth');

Route::prefix('mantenimiento')->group(function () {
    Route::get('/ordentrabajo/{ordentrabajo}/pdf', [OrdenTrabajoController::class, 'pdf'])->name('ordentrabajo.pdf');

    Route::resource('ubiplanta', UbicacionPlantaController::class);
    Route::resource('ordentrabajo', OrdenTrabajoController::class);
    Route::post('/ordentrabajo/hasTareas', [OrdenTrabajoController::class, 'hasTareas']);
    Route::post('/ordentrabajo/hasSistema', [OrdenTrabajoController::class, 'hasSistema']);
    Route::post('/ordentrabajo/{ordentrabajo}/hasSistema', [OrdenTrabajoController::class, 'hasSistema']);
    Route::post('/ordentrabajo/{ordentrabajo}/hasEquipo', [OrdenTrabajoController::class, 'hasEquipo']);
    Route::post('/ordentrabajo/hasEquipo', [OrdenTrabajoController::class, 'hasEquipo']);
    Route::post('/ordentrabajo/guardarmanoobra', [OrdenTrabajoController::class, 'guardarmanoobra']);
    Route::post('equipos', [OrdenTrabajoController::class, 'hasEquipo']);

   // Route::get('ordentrabajo/{acueducto}/acueducto', [OrdenTrabajoController::class, 'obtenersistemas']);


})->middleware('auth');

Route::resource('usuarios', UsuarioController::class);
Route::resource('rol', RolController::class);
