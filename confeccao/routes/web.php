<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\FornecedoresControllers;
use App\Http\Controllers\EstoquesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cliente', [ClienteController::class, 'index']) -> name('clientes.index');

Route::get('/pedido', [PedidosController::class, 'index']) -> name('pedidos.index');

Route::get('/fornecedor', [FornecedoresControllers::class, 'index']) -> name('fornecedores.index');

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