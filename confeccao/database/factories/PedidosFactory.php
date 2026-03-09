<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedidos>
 */
class PedidosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cliente_id' => fake()->randomElement(\App\Models\Clientes::pluck('id')->toArray()),
            'produto_id' => fake()->randomElement(\App\Models\Produto::pluck('id')->toArray()),
            'quantidade' => fake()->numberBetween(1, 100),
            'status' => fake()->randomElement(['pendente', 'processando', 'concluído']),
        ];
    }
}
