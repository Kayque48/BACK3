<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemons;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GdDriver;
use Illuminate\Support\Facades\Storage;

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
            'sprite'          => 'required|image|mimes:jpeg,png,gif,webp|max:5120',
            'sprite_shiny'    => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
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

<<<<<<< HEAD
        // 🔧 CORREÇÃO: Atribuir um external_id começando em 5000 para evitar conflito com a PokeAPI
        // A PokeAPI tem Pokémons com IDs de 1 a ~1025, então usamos 5000+ para customizados
        $ultimoExternalId = \App\Models\Pokemons::max('external_id') ?? 4999;
=======
        // 🔧 Processar upload de arquivos e armazenar paths
        if ($request->hasFile('sprite')) {
            $imagemManager = new ImageManager(new GdDriver());
            $imagem = $imagemManager->read($request->file('sprite'))->resize(300, 300);
            
            $nomeArquivo = 'pokemons/sprites/' . uniqid() . '.webp';
            \Storage::disk('public')->put($nomeArquivo, $imagem->toWebp(80));
            $dados['sprite_file'] = $nomeArquivo;
            $dados['sprite'] = null;
        }

        if ($request->hasFile('sprite_shiny')) {
            $imagemManager = new ImageManager(new GdDriver());
            $imagem = $imagemManager->read($request->file('sprite_shiny'))->resize(300, 300);
            
            $nomeArquivo = 'pokemons/sprites/' . uniqid() . '.webp';
            \Storage::disk('public')->put($nomeArquivo, $imagem->toWebp(80));
            $dados['sprite_shiny_file'] = $nomeArquivo;
            $dados['sprite_shiny'] = null;
        }

        // 🔧 CORREÇÃO: Atribuir um external_id começando em 10000 para evitar conflito com a PokeAPI
        // A PokeAPI tem Pokémons com IDs de 1 a ~1025, então usamos 10000+ para customizados
        $ultimoExternalId = \App\Models\Pokemons::max('external_id') ?? 9999;
>>>>>>> cc3fbae19e555af761bb51dcfe44052b69c27521
        $dados['external_id'] = $ultimoExternalId + 1;

        \App\Models\Pokemons::create($dados);

        return back()->with('sucesso', 'Pokémon cadastrado com sucesso!');
    }

    // public function edit(Pokemons $pokemon) {
    //     return view('pokemon.edit', compact('pokemon'));
    // }

}

