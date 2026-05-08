<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Esta migração adiciona campos para armazenar arquivos de imagem e áudio
     * localmente no servidor em vez de usar URLs externas.
     */
    public function up(): void
    {
        Schema::table('_pokemons', function (Blueprint $table) {
            // Adiciona campos para armazenar os paths dos arquivos locais
            $table->string('sprite_file')->nullable()->after('sprite')->comment('Caminho do arquivo da sprite local');
            $table->string('sprite_shiny_file')->nullable()->after('sprite_shiny')->comment('Caminho do arquivo da sprite shiny local');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('_pokemons', function (Blueprint $table) {
            $table->dropColumn(['sprite_file', 'sprite_shiny_file']);
        });
    }
};
