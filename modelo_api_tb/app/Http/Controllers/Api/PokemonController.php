<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
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
            $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$nomeOuId}");

            if ($response->successful()) {
                $pokemon = $response->json();
            } else {
                return back()->with('erro', 'Pokémon não encontrado! Tente outro.');
            }
        }
        
        return view('pokemon', compact('pokemon'));
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
