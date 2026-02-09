<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/empresa', function() {
   return view('site/empresa'); 
});

Route::any('/any', function () {
    return "Permitir todo conteúdo put, delete, get, post";
});

// // Parametros especificos 
// Route::match(['get', 'post'], '/match', function() {
//     return "Permite acessos definidos";
// });

// Parametros especificos 
Route::match(['put', 'delete'], '/match', function() {
    return "Permite acessos definidos";
});

// Route::get('/produto/{id}', function ($id) {
//     return "o id do produto é: ". $id;
// });

// Route::get('/produto/{id}/{cat}', function ($id, $cat) {
//     return "o id do produto é: ". $id . "<br>O meu nome é ". $cat;
// });

Route::get('/produto/{id}/{cat?}', function ($id, $cat = '') {
    return "o id do produto é: ". $id . "<br>O meu nome é ". $cat;
});

// Route::get('/sobre', function () {
//     return redirect('/empresa');
// });

// Encurtar rotas
Route::redirect('/sobre', '/empresa');

// Criar nomes para rotas
Route::get('/new', function() {
    return view('site/news');
})->name('noticias');

Route::get('/novidades', function() {
    return redirect()->route('noticias');
});