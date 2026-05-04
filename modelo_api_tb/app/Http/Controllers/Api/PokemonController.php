<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Pokemons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pokemon = null;
        
        // Pega o parâmetro 'name' ou 'pokemon' da requisição
        $busca = $request->input('name') ?? $request->input('pokemon');
        
        if ($busca) {
            $nomeOuId = strtolower(trim($busca)); // Converter para minúsculas e remover espaços
            
            // PASSO 1: Buscar primeiro no banco de dados local
            $pokemonLocal = null;
            
            // Tenta buscar por nome
            $pokemonLocal = Pokemons::where('name', 'LIKE', "%{$nomeOuId}%")->first();
            
            // Se não encontrou por nome e o termo é numérico, tenta buscar por ID
            if (!$pokemonLocal && is_numeric($nomeOuId)) {
                $pokemonLocal = Pokemons::find((int)$nomeOuId);
            }
            
            if ($pokemonLocal) {
                // Converter o modelo para array no formato similar à PokeAPI
                $pokemon = $this->converterModeloParaArray($pokemonLocal);
            } else {
                // PASSO 2: Se não encontrar no banco, buscar na PokeAPI
                $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$nomeOuId}");

                if ($response->successful()) {
                    $pokemon = $response->json();
                } else {
                    return back()->with('erro', 'Pokémon não encontrado! Tente outro.');
                }
            }
        }
        
        return view('pokemon', compact('pokemon'));
    }

    /**
     * Converte um modelo Pokémon do banco para o formato da PokeAPI
     */
    private function converterModeloParaArray($pokemonLocal)
    {
        $tipos = is_array($pokemonLocal->types) ? $pokemonLocal->types : json_decode($pokemonLocal->types, true);
        $habilidades = is_array($pokemonLocal->abilities) ? $pokemonLocal->abilities : json_decode($pokemonLocal->abilities, true);

        return [
            'id' => $pokemonLocal->id,
            'name' => $pokemonLocal->name,
            'height' => $pokemonLocal->height,
            'weight' => $pokemonLocal->weight,
            'base_experience' => $pokemonLocal->base_experience,
            'types' => array_map(function($tipo) {
                return [
                    'type' => [
                        'name' => is_string($tipo) ? $tipo : $tipo['name'] ?? $tipo
                    ]
                ];
            }, $tipos ?? []),
            'abilities' => array_map(function($ability) {
                $abilityName = is_string($ability) ? $ability : $ability['name'] ?? $ability;
                return [
                    'ability' => ['name' => $abilityName],
                    'is_hidden' => str_contains($ability, 'hidden') ?? false
                ];
            }, $habilidades ?? []),
            'sprites' => [
                'front_default' => $pokemonLocal->sprite,
                'other' => [
                    'official-artwork' => [
                        'front_default' => $pokemonLocal->sprite,
                        'front_shiny' => null
                    ]
                ]
            ],
            'stats' => [
                ['stat' => ['name' => 'hp'], 'base_stat' => $pokemonLocal->hp],
                ['stat' => ['name' => 'attack'], 'base_stat' => $pokemonLocal->attack],
                ['stat' => ['name' => 'defense'], 'base_stat' => $pokemonLocal->defense],
                ['stat' => ['name' => 'sp-attack'], 'base_stat' => $pokemonLocal->special_attack],
                ['stat' => ['name' => 'sp-defense'], 'base_stat' => $pokemonLocal->special_defense],
                ['stat' => ['name' => 'speed'], 'base_stat' => $pokemonLocal->speed],
            ]
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
