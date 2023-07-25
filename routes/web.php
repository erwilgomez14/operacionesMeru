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
use \App\Http\Controllers\SubsistemaController;
use \App\Http\Controllers\TareaController;
use \App\Http\Controllers\HerramientaController;
use App\Http\Controllers\MarcaEquipoController;
use App\Http\Controllers\ModeloEquipoController;

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
    return redirect()->route('login');
});
Route::prefix('panel')->middleware('auth')->group(function () {
    Route::resource('', PanelController::class);
    Route::get('/mantenimientopreventivo/pdf', [MantenimientoPreventivoController::class, 'pdf'])->name('mantenimientopreventivo.pdf');
    Route::resource('mantenimientopreventivo', MantenimientoPreventivoController::class);
    Route::get('/mantenimientopreventivo/hasOrden', [MantenimientoPreventivoController::class, 'hasOrden']);

});
Route::prefix('activos')->middleware('auth')->group(function () {
    Route::resource('acueductos', AcueductoController::class)->middleware('rol:gerente,super-usuario');
    Route::get('equipos/createtipoeq', [EquipoController::class, 'createtipoeq'])->name('equipos.createtipoeq');
    Route::post('equipos/storetipoeq', [EquipoController::class, 'storetipoeq'])->name('equipos.storetipoeq');
    Route::resource('equipos', EquipoController::class);
    Route::get('/consultar-sistema', [SistemaController::class, 'consultarSistema']);
    Route::get('/consultar-subsistema', [SubsistemaController::class, 'consultar_subsistema']);

    Route::resource('sistemas', SistemaController::class);
    Route::resource('subsistemas', SubsistemaController::class);
    Route::get('/herramientas/creategroup', [HerramientaController::class, 'creategroup'])->name('herramientas.creategroup');
    Route::post('/herramientas/group', [HerramientaController::class, 'storegroup'])->name('herramientas.storeegroup');


    Route::resource('herramientas', HerramientaController::class);

    Route::resource('ubiplanta', UbicacionPlantaController::class);

});

Route::prefix('mantenimiento')->middleware('auth')->group(function () {
    Route::get('/ordentrabajo/ordenpdf', [OrdenTrabajoController::class, 'pdfff'])->name('ordentrabajo.pdfff');
    Route::get('/ordentrabajo/{ordentrabajo}/pdf', [OrdenTrabajoController::class, 'pdf'])->name('ordentrabajo.pdf');
    Route::post('/grupotareas/hasEquipo', [TareaController::class, 'hasEquipo']);
    Route::resource('grupotareas', TareaController::class);
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


});

Route::prefix('ajustes')->middleware('auth')->group(function () {

    Route::resource('usuarios', UsuarioController::class);
    Route::resource('rol', RolController::class);
    Route::resource('marca', MarcaEquipoController::class);
    Route::resource('modelo', ModeloEquipoController::class);


});
