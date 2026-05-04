<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('_pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('height');
            $table->integer('weight');
            $table->integer('base_experience');
            $table->integer('hp');
            $table->integer('attack');
            $table->integer('defense');
            $table->integer('special_attack');
            $table->integer('special_defense');
            $table->integer('speed');
            $table->string('sprite');
            $table->json('abilities')->nullable();
            $table->string('generation');
            $table->json('types')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_pokemons');
    }
};
