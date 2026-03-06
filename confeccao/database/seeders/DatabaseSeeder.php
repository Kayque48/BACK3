<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Clientes;
use App\Models\Pedidos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        \App\Models\Pedidos::factory(10)->create();
        \App\Models\Fornecedores::factory(10)->create();
        \App\Models\Produto::factory(10)->create();
        \App\Models\Estoques::factory(10)->create();
        \App\Models\Clientes::factory(10)->create();




        // User::factory()->create([
        //     'name' => 'Confecção Kayqu',
        //     'email' => 'kayqu@coffecao.com.br',
        // ]);

        // User::factory()->create([
        //     'nome' => 'Kevin Mahmar',
        //     'cpf' =>  '123456789-12',
        // ]);
    }
}


