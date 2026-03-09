<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\FornecedoresControllers;
use App\Http\Controllers\EstoquesController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

// Clientes
Route::get('/clientes/create', [ClienteController::class, 'create']) -> name('clientes.create');

Route::post('/clientes', [ClienteController::class, 'store']) -> name('clientes.store');

Route::get('/cliente', [ClienteController::class, 'index']) -> name('clientes.index');


// Produtos
Route::get('/produtos/create', [ProdutoController::class, 'create']) -> name('produtos.create');

Route::post('/produtos', [ProdutoController::class, 'store']) -> name('produtos.store');

Route::get('/produtos', [ProdutoController::class, 'index']) -> name('produtos.index');


// Fornecedores
Route::get('/fornecedor/create', [FornecedoresControllers::class, 'create']) -> name('fornecedores.create');

Route::post('/fornecedor', [FornecedoresControllers::class, 'store']) -> name('fornecedores.store');

Route::get('/fornecedor', [FornecedoresControllers::class, 'index']) -> name('fornecedores.index');


// Pedidos
Route::get('/pedido/create', [PedidosController::class, 'create']) -> name('pedidos.create');

Route::post('/pedido', [PedidosController::class, 'store']) -> name('pedidos.store');

Route::get('/pedido', [PedidosController::class, 'index']) -> name('pedidos.index');


// Estoques
Route::get('/estoque/create', [EstoquesController::class, 'create']) -> name('estoques.create');

Route::post('/estoque', [EstoquesController::class, 'store']) -> name('estoques.store');

Route::get('/estoque', [EstoquesController::class, 'index']) -> name('estoques.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';