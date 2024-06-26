<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicacionController;
use \App\Http\Controllers\UsuarioController;
use App\Models\Publicacion;
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

Route::get('/', [PublicacionController::class,'index']);

Route::resource("usuario", UsuarioController::class)->middleware('auth');

Route::resource("publicacion", PublicacionController::class);

Route::resource("comentario", ComentarioController::class)->middleware('auth');


Route::get('publicacion/{tipo}/listado', [PublicacionController::class,'listado'])->name('publicacion.listado');

Route::get('publicacion/{tipo}/crear', [PublicacionController::class,'createArguments'])->name('publicacion.crear')->middleware('auth');

Route::get('publicacion/{id_pub}/guardar', [PublicacionController::class,'guardarPublicacion'])->name('publicacion.guardar')->middleware('auth');

Route::get('usuario/{id_us}/guardado', [PublicacionController::class,'showGuardados'])->name('usuario.guardados')->middleware('auth');

Route::get('usuario/{id_us}/calendario', [PublicacionController::class,'showCalendario'])->name('usuario.calendario')->middleware('auth');

Route::post('publicacion/filtros', [PublicacionController::class,'listadoFiltrado'])->name('publicacion.filtros');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
