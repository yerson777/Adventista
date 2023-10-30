<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiembroController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\AsisnacionMiembrosController;
use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\DiezmoController;
use App\Http\Controllers\GastosDepartamentoController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/crearMiembro', [MiembroController::class, 'mostrarFormulario'])->name('miembro.crear'); 
Route::post('/guardarMiembro', [MiembroController::class, 'crear'])->name('miembro.guardar'); 
Route::get('/listarMiembro', [MiembroController::class, 'listar'])->name('miembro.listar');

Route::get('/editarMiembro/{id}', [MiembroController::class, 'mostrarFormularioEditar'])->name('miembro.editar');
Route::put('/actualizarMiembro/{id}', [MiembroController::class, 'editar'])->name('miembro.actualizar');

Route::delete('/eliminarMiembro/{id}', [MiembroController::class, 'eliminar'])->name('miembro.eliminar');

Route::get('/listarDepartamento',[DepartamentoController::class, 'listarDepartamento'])->name('departamento.listar');
Route::post('/crearDepartamentos',[DepartamentoController::class, 'crearDepartamento'])->name('departamento.crear');
Route::put('/editarDepartamento/{id}',[DepartamentoController::class, 'editarDepartamento'])->name('departamento.editar');
Route::delete('/eliminarDepartamento/{id}',[DepartamentoController::class, 'eliminarDepartamento'])->name('departamento.eliminar');

Route::get('/listarAsignacion',[AsisnacionMiembrosController:: class, 'listarAsignacion'])->name('asignacion.listar');
//Route::get('/crearAsignacion', [AsisnacionMiembrosController::class, 'mostrarFormularioAsignacion'])->name('asignacion.crear');
Route::post('/guardarAsignacion', [AsisnacionMiembrosController::class, 'crearAsignacion'])->name('asignacion.guardar');
Route::delete('/asignacion/{id}', [AsisnacionMiembrosController::class, 'eliminarAsignacion'])->name('asignacion.eliminar');
Route::put('/asignacion/editar/{id}', [AsisnacionMiembrosController::class, 'editarAsignacion'])->name('asignacion.editar');

Route::get('/listarPublicaciones', [PublicacionesController::class, 'listarPublicacion'])->name('publicaciones.listar');
Route::post('/crearPublicacion', [PublicacionesController::class, 'crearPublicacion'])->name('publicaciones.crear');
Route::put('/editarPublicacion/{id}',[PublicacionesController:: class,'editarPublicacion'])->name('publicaciones.editar');
Route::delete('/eliminarPublicacion/{id}', [PublicacionesController::class, 'eliminarPublicacion'])->name('publicaciones.eliminar');

Route::get('/listarComentarios',[ComentarioController::class, 'listarComentarios'])->name('comentario.listar');
Route::post('/crearComentario',[ComentarioController::class, 'crearComentario'])->name('comentario.crear');
Route::put('/editarComentario/{id}',[ComentarioController::class, 'editarComentario'])->name('comentario.editar');
Route::delete('/eliminarComentario/{id}',[ComentarioController::class, 'eliminarComentario'])->name('comentario.eliminar');

Route::get('/listarDiesmo',[DiezmoController::class, 'listarDiezmo'])->name('diesmo.listar');
Route::post('/crearDiesmo',[DiezmoController:: class, 'crearDiezmo'])->name('diesmo.crear');
Route::put('/editarDiezmo/{id}', [DiezmoController::class, 'editarDiezmo'])->name('diezmo.editar');
Route::delete('/eliminarDiesmo/{id}',[DiezmoController::class,'eliminarDiezmo'])->name('diesmo.eliminar');

Route::get('/listarGastos',[GastosDepartamentoController::class, 'listarGastosDepartamento'])->name('gasto.listar');
Route::post('/crearGasto',[GastosDepartamentoController::class, 'crearGastoDepartamento'])->name('gasto.crear');
Route::put('/editarGasto/{id}', [GastosDepartamentoController::class, 'editarGastosDepartamento'])->name('gasto.editar');
Route::delete('/eliminarGasto/{id}', [GastosDepartamentoController::class, 'eliminarGastosDepartamento'])->name('gasto.eliminar');
