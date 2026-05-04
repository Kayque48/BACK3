<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Api\PokemonController as ApiPokemonController;
use App\Http\Controllers\PokemonController;

/*
|--------------------------------------------------------------------------
| Rotas Pokémon
|--------------------------------------------------------------------------
*/

// Rota para página inicial / buscar pokémon
Route::get('/', [ApiPokemonController::class, 'index'])->name('pokemon.index');
Route::get('/pokemon', [ApiPokemonController::class, 'index'])->name('pokemon.show');

// Exemplo 1: GET - Buscando dados de uma API Externa (PokeAPI) - API JSON
Route::get('/api/pokemon/{nome}', function ($nome) {
    $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$nome}");

    if ($response->successful()) {
        $dados = $response->json();
        return response()->json([
            'status' => 'Conectado com sucesso!',
            'resultado' => [
                'identificador' => $dados['id'],
                'nome_do_pokemon' => ucfirst($dados['name']),
                'foto' => $dados['sprites']['front_default']
            ]
        ], 200);
    }

    return response()->json(['erro' => 'Pokémon não encontrado'], 404);
});

// Rota para EXIBIR o formulário de cadastro
Route::get('/pokemon/novo', [PokemonController::class, 'create'])->name('pokemon.create');

// Rota para RECEBER os dados do formulário e salvar no banco
Route::post('/pokemon/novo', [PokemonController::class, 'store'])->name('pokemon.store');