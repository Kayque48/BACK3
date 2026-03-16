<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\FornecedoresControllers;
use App\Http\Controllers\EstoquesController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Clientes
Route::get('/clientes/create', [ClienteController::class, 'create']) -> name('clientes.create');

Route::post('/clientes', [ClienteController::class, 'store']) -> name('clientes.store');

Route::get('/clientes', [ClienteController::class, 'index']) -> name('clientes.index');

Route::get('/clientes/edit/{clientes}', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/update/{clientes}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/destroy/{clientes}', [ClienteController::class, 'destroy'])->name('clientes.destroy');


// Produtos
Route::get('/produtos/create', [ProdutoController::class, 'create']) -> name('produtos.create');

Route::post('/produtos', [ProdutoController::class, 'store']) -> name('produtos.store');

Route::get('/produtos', [ProdutoController::class, 'index']) -> name('produtos.index');

Route::get('/produtos/edit/{produtos}', [ProdutoController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/update/{produtos}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/destroy/{produtos}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');



// Fornecedores
Route::get('/fornecedor/create', [FornecedoresControllers::class, 'create']) -> name('fornecedores.create');

Route::post('/fornecedor', [FornecedoresControllers::class, 'store']) -> name('fornecedores.store');

Route::get('/fornecedor', [FornecedoresControllers::class, 'index']) -> name('fornecedores.index');

Route::get('/fornecedores/edit/{fornecedores}', [FornecedoresControllers::class, 'edit'])->name('fornecedores.edit');
Route::put('/fornecedores/update/{fornecedores}', [FornecedoresControllers::class, 'update'])->name('fornecedores.update');
Route::delete('/fornecedores/destroy/{fornecedores}', [FornecedoresControllers::class, 'destroy'])->name('fornecedores.destroy');



// Pedidos
Route::get('/pedido/create', [PedidosController::class, 'create']) -> name('pedidos.create');

Route::post('/pedido', [PedidosController::class, 'store']) -> name('pedidos.store');

Route::get('/pedido', [PedidosController::class, 'index']) -> name('pedidos.index');

Route::get('/produtos/edit/{produtos}', [ProdutoController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/update/{produtos}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/destroy/{produtos}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');



// Estoques
Route::get('/estoque/create', [EstoquesController::class, 'create']) -> name('estoques.create');

Route::post('/estoque', [EstoquesController::class, 'store']) -> name('estoques.store');

Route::get('/estoque', [EstoquesController::class, 'index']) -> name('estoques.index');

Route::get('/estoques/edit/{estoques}', [EstoquesController::class, 'edit'])->name('estoques.edit');
Route::put('/estoques/update/{estoques}', [EstoquesController::class, 'update'])->name('estoques.update');
Route::delete('/estoques/destroy/{estoques}', [EstoquesController::class, 'destroy'])->name('estoques.destroy');



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';