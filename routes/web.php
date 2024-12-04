<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LlistaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProducteController;


Route::resource('llistas', LlistaController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('productes', ProducteController::class);
Route::post('/producte/{producte}/toggle', [ProducteController::class, 'toggle'])->name('producte.toggle');
Route::post('/llistas/{llista}/agregar-producto', [LlistaController::class, 'agregarProducto'])->name('llistas.agregarProducto');
Route::delete('/llistas/{llista}/quitar-producto/{producte}', [LlistaController::class, 'quitarProducto'])->name('llistas.quitarProducto');
Route::post('/llista/{llista}/completar-producto/{producte}', [LlistaController::class, 'completarProducto'])->name('llistas.completarProducto');
Route::post('/llistas/{llista}/share', [LlistaController::class, 'shareList'])->name('llistas.shareList');
Route::post('/llistas/{llista}/invite', [LlistaController::class, 'inviteUser'])->name('llistas.inviteUser');
// + Extres
Route::post('/llistes/{id}/markAllCompleted', [LlistaController::class, 'markAllCompleted'])->name('llistas.markAllCompleted');
Route::post('/llistes/{id}/markAllUncompleted', [LlistaController::class, 'markAllUncompleted'])->name('llistas.markAllUncompleted');
Route::post('/llistes/{id}/deleteAllProducts', [LlistaController::class, 'deleteAllProducts'])->name('llistas.deleteAllProducts');
//compartir
Route::post('/llistes/{id}/share-link', [LlistaController::class, 'getShareLink'])->name('llistas.getShareLink');
Route::get('/llistes/{id}/view', [LlistaController::class, 'view'])->name('llistas.view');

Route::get('llistas/{id}/productes/{productId}/edit', [LlistaController::class, 'editProduct'])->name('llistas.editProduct');
Route::delete('llistas/{id}/productes/{productId}', [LlistaController::class, 'deleteProduct'])->name('llistas.deleteProduct');


