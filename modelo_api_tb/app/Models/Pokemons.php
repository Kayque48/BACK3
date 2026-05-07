<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemons extends Model
{
    // Define a tabela caso ela tenha o underline que vimos antes
    protected $table = '_pokemons'; 

    protected $guarded = [];

    // Isso converte o array do formulário em JSON para o banco de dados
    protected $casts = [
        'types' => 'array',
        'abilities' => 'array',
    ];

    // 🔧 Adicionar o external_id como fillable para que possa ser preenchido em mass assignment
    protected $fillable = [
        'name',
        'generation',
        'height',
        'weight',
        'base_experience',
        'sprite',
        'sprite_shiny',
        'cry_url',
        'types',
        'abilities',
        'hp',
        'attack',
        'defense',
        'special_attack',
        'special_defense',
        'speed',
        'external_id',
    ];
}