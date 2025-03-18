<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LlistaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProducteController;


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

// Ruta d'inici, que carrega la vista 'welcome'
Route::get('/', function () {
    return view('welcome');
});

// Redirigeix a 'llistas.index' després de l'inici de sessió
Route::middleware(['auth', 'verified'])->get('/home', [LlistaController::class, 'index'])->name('llistas.index');

// Rutes que només són accessibles per usuaris autenticats
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/llistas', [LlistaController::class, 'index'])->name('llistas.index');
    Route::resource('llistas', LlistaController::class);
});

// Rutes per al perfil d'usuari
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CRUD bàsic per a llistes, categories i productes
Route::resource('llistas', LlistaController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('productes', ProducteController::class);

// Accions sobre productes dins de llistes
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

require __DIR__.'/auth.php';
