<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Torna as colunas sprite nullable porque agora estamos usando arquivos locais
     */
    public function up(): void
    {
        Schema::table('_pokemons', function (Blueprint $table) {
            $table->string('sprite')->nullable()->change();
            $table->string('sprite_shiny')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Não reverter para evitar erro com valores NULL existentes
        // Deixar as colunas como nullable
    }
};
