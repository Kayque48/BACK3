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
}