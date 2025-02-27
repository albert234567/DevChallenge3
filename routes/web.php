<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LlistaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProducteController;


Route::get('/', function () {
    return redirect()->route('llistas.index');
});

Route::resource('llistas', LlistaController::class);
Route::resource('categorias', CategoriaController::class);
Route::post('/llistes/{llista}/completar/{producte}', [LlistaController::class, 'completarProducto'])->name('llistas.completarProducto');
Route::get('/productes/{producte}/edit', [ProducteController::class, 'edit'])->name('productes.edit');
Route::delete('/llistas/{llista}/productes/{producte}', [LlistaController::class, 'quitarProducto'])->name('llistas.quitarProducto');
Route::post('/llistas/{llista}/productes', [LlistaController::class, 'agregarProducto'])->name('llistas.agregarProducto');

// Ruta per generar l'enllaç de compartir
Route::post('/llistes/{id}/share-link', [LlistaController::class, 'getShareLink'])->name('llistas.getShareLink');
Route::get('/llistes/{id}/view', [LlistaController::class, 'view'])->name('llistas.view');

// Marcar i desmarcar
Route::post('/llistes/{id}/markAllCompleted', [LlistaController::class, 'markAllCompleted'])->name('llistas.markAllCompleted');
Route::post('/llistes/{id}/markAllUncompleted', [LlistaController::class, 'markAllUncompleted'])->name('llistas.markAllUncompleted');
Route::post('/llistes/{id}/deleteAllProducts', [LlistaController::class, 'deleteAllProducts'])->name('llistas.deleteAllProducts');
