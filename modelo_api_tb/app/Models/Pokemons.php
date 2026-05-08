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

    // 🔧 Métodos para acessar as URLs dos arquivos armazenados
    public function getSpriteUrl()
    {
        if ($this->sprite_file) {
            return asset('storage/' . $this->sprite_file);
        }
        return $this->sprite; // Fallback para URL se existir
    }

    public function getSpriteShinyUrl()
    {
        if ($this->sprite_shiny_file) {
            return asset('storage/' . $this->sprite_shiny_file);
        }
        return $this->sprite_shiny; // Fallback para URL se existir
    }



    // 🔧 Adicionar o external_id como fillable para que possa ser preenchido em mass assignment
    protected $fillable = [
        'name',
        'generation',
        'height',
        'weight',
        'base_experience',
        'sprite',
        'sprite_file',
        'sprite_shiny',
        'sprite_shiny_file',
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