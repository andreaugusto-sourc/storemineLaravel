<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CupomDescontoController;
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

Route::get('/', [ProdutoController::class,'index']);
Route::get('dashboard',[ProdutoController::class,'dashboard']);
Route::resources([
    'categorias' => CategoriaController::class,
    'produtos' => ProdutoController::class,
    'cupons' => CupomDescontoController::class,
]);

require __DIR__.'/auth.php';
