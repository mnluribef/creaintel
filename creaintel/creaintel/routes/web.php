<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\PreinscripcionController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Livewire\Inscripcion;
use App\Http\Livewire\PreinscripcionLW;
use App\Http\Livewire\Preinscripcion;
use App\Http\Livewire\Preinscribir;
// use App\Models\Preinscripcion;
use App\Http\Livewire\Bitacora;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Usuarios;

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
    return view('auth.login');
});

Route::get('home', function () {
    return view('index.index');
});

Route::get('/dashboard', [Preinscripcion::class, 'index'])->name('dashboard');



/*  Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});  */



Route::group(['middleware' => ['auth']], function () {
    Route::get('/roles', Roles::class);
    // Route::resource('roles', RolController::class);
    // Route::resource('usuarios', UsuarioController::class);
    Route::get('/usuarios', Usuarios::class);
    Route::get('/preinscripcion', Preinscripcion::class);
    Route::get('/inscripcion', Inscripcion::class);
    // Route::resource('preinscripcion', PreinscripcionController::class);
    // Route::get('/preinscripcion', PreinscripcionLW::class);
    Route::match(['get', 'post'], '/preinscripcion/create', PreinscripcionLW::class);

    Route::get('/preinscribir', Preinscribir::class)->name('preinscribir');;

    Route::get('/bitacora', Bitacora::class);
    Route::get('home', [PreinscripcionController::class, 'count']);
    // Route::get('preinscripcion/Preinscripcion', [PreinscripcionController::class, 'downloadPDF'])->name('Preinscripcion');
    // Route::get('preinscripcion.planilla_Inscripcion', [PreinscripcionController::class, 'planilla_Inscripcion'])->name('InscripcionPDF');
});

// Inscribir

Route::get('/preinscripcion/{id}/inscribir', 'App\Http\Controllers\PreinscripcionController@inscribir')->name('preinscripcion.inscribir');

// Inscribir


//Observaciones
Route::GET('/preinscripcion/{id}/observaciones', [\App\Http\Controllers\PreinscripcionController::class, 'observaciones'])->name('preinscripcion.observaciones');

Route::put('/preinscripcion/{usuario}', 'UsuarioController@update');

//Observaciones

/* Route::GET('preinscripcion/observaciones/{id}', [PreinscripcionController::class, 'observaciones']); */


//Observaciones

Route::POST('/preinscripcion/{id}/asignarjurado', [PreinscripcionController::class, 'asignarjurado'])->name('preinscripcion.asignarjurado');

// Status Proyecto

Route::get('/status-proyecto/{id}', [PreinscripcionController::class, 'statusproyecto']);

// Status Proyecto

// Status Planilla


Route::get('/status-planilla/{id}', [PreinscripcionController::class, 'statusplanilla']);

// Status Planilla


// Route::get('preinscripcion.download', [PreinscripcionController::class, 'downloadPDF'])->name('PreinscripcionPDF');
Route::get('preinscripcion/{id}/download-pdf', [PreinscripcionController::class, 'downloadPDF'])->name('PreinscripcionPDF');

Route::get('preinscripcion/{id}/planilla_Inscripcion', [PreinscripcionController::class, 'planilla_Inscripcion'])->name('InscripcionPDF');

// Route::get('preinscripcion.planilla_Inscripcion', [PreinscripcionController::class, 'planilla_Inscripcion'])->name('InscripcionPDF');

/* Route::get('/update_inscribir', 'App\Http\Controllers\PreinscripcionController@update_inscribir')->name('preinscripcion.update_inscribir'); */

Route::resources([
    // 'preinscripcion' => 'App\Http\Controllers\PreinscripcionController', 
    // 'inscripcion' => 'App\Http\Controllers\InscripcionController',
    'estudiante' => 'App\Http\Controllers\EstudianteController',
    'docente' => 'App\Http\Controllers\DocenteController',
    'pnf' => 'App\Http\Controllers\PNFController',
    'trayecto' => 'App\Http\Controllers\TrayectoController',
    'seccion' => 'App\Http\Controllers\SeccionController',
    'lineainves' => 'App\Http\Controllers\LineaInvesController',
    'sede' => 'App\Http\Controllers\SedeController',
    'periodo' => 'App\Http\Controllers\PeriodoController',
    'estado' => 'App\Http\Controllers\EstadoController',
    'municipio' => 'App\Http\Controllers\MunicipioController',
    'parroquia' => 'App\Http\Controllers\ParroquiaController',
    'sector' => 'App\Http\Controllers\SectorController',
]);

Route::get('/pnf/dependiente', [PNFController::class, 'dependiente'])->name('pnf.dependiente');


Route::put('preinscripcion/{preinscripcion}/un_status', 'App\Http\Controllers\PreinscripcionController@un_status')->name('preinscripcion.un_status');

Route::get('/change-status/{id}', [PreinscripcionController::class, 'changeStatus']);

//backup and restore bd
Route::get('/backups', [App\Http\Controllers\BackupController::class, 'index'])->name('backups');
Route::post('/backups', [App\Http\Controllers\BackupController::class, 'store'])->name('backups.store');
Route::get('/backups/download/database/{key}', [App\Http\Controllers\BackupController::class, 'downloadDatabase'])->name('backups.download.database');
Route::get('/backups/download/storage/{key}', [App\Http\Controllers\BackupController::class, 'downloadStorage'])->name('backups.download.storage');
Route::post('/backups/restore', [App\Http\Controllers\BackupController::class, 'restore'])->name('backups.restore');
Route::delete('/backups/destroy', [App\Http\Controllers\BackupController::class, 'destroy'])->name('backups.destroy');

//
