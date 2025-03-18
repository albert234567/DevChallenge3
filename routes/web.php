<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LlistaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProducteController;

// Pàgina inicial
Route::get('/', function () {
    return redirect()->route('llistas.index');
});

// CRUD bàsic
Route::resource('llistas', LlistaController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('productes', ProducteController::class);

// Accions sobre llistes (personalitzades)
// Completar producte dins d'una llista
Route::post('/llistas/{llista}/completar/{producte}', [LlistaController::class, 'completarProducto'])->name('llistas.completarProducto');

// Generar enllaç per compartir
Route::post('/llistes/{id}/share-link', [LlistaController::class, 'getShareLink'])->name('llistas.getShareLink');
// Veure la llista compartida
Route::get('/llistes/{id}/view', [LlistaController::class, 'view'])->name('llistas.view');

// Accions massives sobre productes d'una llista
Route::post('/llistes/{id}/markAllCompleted', [LlistaController::class, 'markAllCompleted'])->name('llistas.markAllCompleted');
Route::post('/llistes/{id}/markAllUncompleted', [LlistaController::class, 'markAllUncompleted'])->name('llistas.markAllUncompleted');
Route::post('/llistes/{id}/deleteAllProducts', [LlistaController::class, 'deleteAllProducts'])->name('llistas.deleteAllProducts');

// Accions sobre productes dins d'una llista
Route::post('/llistas/{llista}/productes', [LlistaController::class, 'agregarProducto'])->name('llistas.agregarProducto');
Route::delete('/llistas/{llista}/productes/{producte}', [LlistaController::class, 'quitarProducto'])->name('llistas.quitarProducto');

// Accions específiques d'edició de productes dins d'una llista
Route::get('/llistas/{llista}/productes/{producte}/edit', [ProducteController::class, 'edit'])->name('productes.editProd');
Route::put('/llistas/{llista}/productes/{producte}', [ProducteController::class, 'update'])->name('productes.update');

// Ruta independent d'edició de productes (fora de llista)
Route::get('/productes/{producte}/edit', [ProducteController::class, 'edit'])->name('productes.edit');
