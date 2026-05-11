<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Esta migração adiciona um campo 'external_id' para diferenciar
     * Pokémons customizados (ID > 5000) dos da PokeAPI (ID 1-1025)
     */
    public function up(): void
    {
        Schema::table('_pokemons', function (Blueprint $table) {
            // Adiciona coluna para armazenar o ID externo/customizado
            $table->integer('external_id')->nullable()->after('id')->unique()->comment('ID customizado para novos Pokémons (começando em 5000)');
            
            // Adiciona campo para shiny
            $table->string('sprite_shiny')->nullable()->after('sprite')->comment('URL da sprite shiny (cor alternativa)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('_pokemons', function (Blueprint $table) {
            $table->dropColumn(['external_id', 'sprite_shiny']);
        });
    }
};
