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
            'produto' => fake()->text(),
            'quantidade' => fake()->numberBetween(1, 100),
            'preco' => fake()->numberBetween(1, 9999),
            'descricao' => fake()->text(),
            'localizacao' => fake()->text(),
        ];
    }
}
