<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CupomDescontoController;
use App\Http\Controllers\CarrinhoController;
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
Route::get('dashboard/categorias',[CategoriaController::class,'dashboard']);
Route::get('dashboard/produtos',[ProdutoController::class,'dashboard']);
Route::get('dashboard/cupons',[CupomDescontoController::class,'dashboard']);
Route::resources([
    'categorias' => CategoriaController::class,
    'produtos' => ProdutoController::class,
    'cupons' => CupomDescontoController::class,
    'carrinho' => CarrinhoController::class,
]);
Route::get('/dashboard', function () {
    return view('dashboard');
});
// rotas do carrinho de compras
Route::get('carrinho/adicionar', function () {
    return redirect()->route('produtos.index');
});
Route::post('carrinho/adicionar/',[CarrinhoController::class,'adicionar'])->name("carrinho.adicionar");
require __DIR__.'/auth.php';
