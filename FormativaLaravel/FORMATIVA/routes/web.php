<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ex1
Route::get('/', function () {
    return view('builds_elden_ring/destreza');
});


// ex2
Route::any('/any', function() {
    return 'Este site aceita qualquer método: get, put, delete e post';
});

// ex3
Route::match(['put', 'delete'], '/match', function() {
    return "Estes site não aceita os métodos get e post";
});

// ex4
Route::get('/usuario/{id}/{nome}', function($id, $nome = '') {
    return "<h1>Usuário<h1> <br>ID: ${id} <br>Nome: ${nome}";
});

// ex5.1

Route::get('/builds_elden_ring/forca', function () {
    return ('FOR');
});

Route::get('/builds_elden_ring/destreza', function () {
    return ('DEX');
});

Route::get('/builds_elden_ring/inteligencia', function () {
    return ('INT');
});

// ex5.2

// Criar nomes para rotas
Route::get('/for', function() {
    return view('build_elden_ring/forca');
})->name('for');

Route::get('/for', function() {
    return redirect()->route('for');
});


// ex6
Route::group( [
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {

    Route::get('dashboard', function() {
        return "dashboard";
    })->name('dashboard');

    Route::get('users', function() {
        return "users";
    })->name('users');

    Route::get('builds', function() {
        return "builds";
    })->name('builds');
});