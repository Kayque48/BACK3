<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemons;

class PokemonController extends Controller
{

    public function create() {
        return view('cadastro');
    }

    public function store(Request $request) {
        
        $dados = $request->validate([
            'name'            => 'required|string|max:100',
            'generation'      => 'required|string',
            'height'          => 'required|integer',
            'weight'          => 'required|integer',
            'base_experience' => 'required|integer',
            'sprite'          => 'required|url',
            'types'           => 'required|array|min:1|max:2', // Valida a regra de até 2 tipos
            'abilities'       => 'nullable|string',
            'hp'              => 'required|integer|between:0,255',
            'attack'          => 'required|integer|between:0,255',
            'defense'         => 'required|integer|between:0,255',
            'special_attack'  => 'required|integer|between:0,255',
            'special_defense' => 'required|integer|between:0,255',
            'speed'           => 'required|integer|between:0,255',
        ]);

        if (!empty($dados['abilities'])) {
            $dados['abilities'] = array_map('trim', explode(',', $dados['abilities']));
        } else {
            $dados['abilities'] = [];
        }

        \App\Models\Pokemons::create($dados);

        return back()->with('sucesso', 'Pokémon cadastrado com sucesso!');
    }

    // public function edit(Pokemons $pokemon) {
    //     return view('pokemon.edit', compact('pokemon'));
    // }

}

