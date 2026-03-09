<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estoques>
 */
class EstoquesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'produto_id' => fake()->randomElement(\App\Models\Produto::pluck('id')->toArray()),
            'quantidade' => fake()->numberBetween(1, 1000),
            'localizacao' => fake()->text(),
        ];
    }
}
