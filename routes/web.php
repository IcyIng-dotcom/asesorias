<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

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

    Route::get('libros/listar-libros', [LibroController::class, 'listar_libros'])
    ->name('libros.listar_libros');

    Route::get('libros/crear', [LibroController::class, 'crear'])
    ->name('libros.crear');

    Route::post('libros/guardar', [LibroController::class, 'guardar'])
    ->name('libros.guardar');

    Route::get('libros/editar/{idLibro}', [LibroController::class, 'editar'])
    ->name('libros.editar');

    Route::post('libros/modificar', [LibroController::class, 'modificar'])
    ->name('libros.modificar');
    
    Route::get('libros/eliminar/{idLibro}', [LibroController::class, 'eliminar'])
    ->name('libros.eliminar');

    Route::get('libros/detalle/{idLibro}', [LibroController::class, 'detalle'])
    ->name('libros.detalle');

});

require __DIR__.'/auth.php';
