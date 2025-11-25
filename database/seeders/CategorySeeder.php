<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Conjuntos Fitness', 'description' => 'Roupas combinadas para treino, incluindo leggings e tops.'],
            ['name' => 'Leggings', 'description' => 'Calças justas e elásticas para atividades físicas.'],
            ['name' => 'Tops Fitness', 'description' => 'Tops esportivos para suporte e conforto durante o treino.'],
            ['name' => 'Shorts e Bermudas', 'description' => 'Roupas curtas para atividades físicas em dias quentes.'],
            ['name' => 'Blusas e Camisetas', 'description' => 'Parte superior confortável para exercícios e uso casual.'],
            ['name' => 'Calças e Joggers', 'description' => 'Calças esportivas para treino e lazer.'],
            ['name' => 'Acessórios', 'description' => 'Itens complementares para atividades físicas, como faixas e squeezes.'],
        ]);
    }
}
