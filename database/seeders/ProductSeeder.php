<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Conjunto Seamless Rosa – Legging + Top',
                'description' => 'Conjunto fitness rosa composto por legging e top seamless, ideal para exercícios com conforto e estilo.',
                'price' => 199.90,
                'category_id' => 1,
                'size' => 'XXL',
                'stock_quantity' => 10,
            ],
            [
                'name' => 'Conjunto Preto Cintura Alta – Compressão Média',
                'description' => 'Conjunto fitness preto com cintura alta e compressão média, perfeito para treinos intensos.',
                'price' => 219.90,
                'category_id' => 1,
                'size' => 'XXL',
                'stock_quantity' => 3,
            ],
            [
                'name' => 'Legging Cintura Alta Preta – Compressão',
                'description' => 'Legging preta com cintura alta e compressão, ideal para suporte durante exercícios.',
                'price' => 129.90,
                'category_id' => 2,
                'size' => 'G',
                'stock_quantity' => 20,
            ],
            [
                'name' => 'Legging Levanta Bumbum Rosa Chiclete',
                'description' => 'Legging rosa chiclete com efeito levanta bumbum, proporcionando conforto e estilo.',
                'price' => 139.90,
                'category_id' => 2,
                'size' => 'P',
                'stock_quantity' => 15,
            ],
            [
                'name' => 'Legging Texturizada Verde Militar',
                'description' => 'Legging texturizada na cor verde militar, oferecendo estilo e conforto para seus treinos.',
                'price' => 149.90,
                'category_id' => 2,
                'size' => 'XXL',
                'stock_quantity' => 2,
            ],
            [
                'name' => 'Top Nadador Preto – Média Sustentação',
                'description' => 'Top nadador preto com média sustentação, ideal para atividades físicas com conforto.',
                'price' => 79.90,
                'category_id' => 3,
                'size' => 'P',
                'stock_quantity' => 25,
            ],
            [
                'name' => 'Top Branco de Alta Sustentação',
                'description' => 'Top branco com alta sustentação, ideal para atividades físicas intensas.',
                'price' => 89.90,
                'category_id' => 3,
                'size' => 'P',
                'stock_quantity' => 18,
            ],
            [
                'name' => 'Top Strappy Rosa Neon',
                'description' => 'Top strappy na cor rosa neon, ideal para atividades físicas com estilo.',
                'price' => 69.90,
                'category_id' => 3,
                'size' => 'M',
                'stock_quantity' => 4,
            ],
            [
                'name' => 'Shorts Levanta Bumbum Preto',
                'description' => 'Shorts preto com efeito levanta bumbum, proporcionando conforto e estilo para seus treinos.',
                'price' => 99.90,
                'category_id' => 4,
                'size' => 'M',
                'stock_quantity' => 14,
            ],
            [
                'name' => 'Shorts Ciclista Cintura Alta – Azul Petróleo',
                'description' => 'Shorts ciclista com cintura alta na cor azul petróleo, ideal para conforto e estilo durante os treinos.',
                'price' => 89.90,
                'category_id' => 4,
                'size' => 'G',
                'stock_quantity' => 10,
            ],
            [
                'name' => 'Camiseta Dry-Fit Feminina Preta',
                'description' => 'Camiseta dry-fit feminina na cor preta, ideal para atividades físicas com conforto.',
                'price' => 69.90,
                'category_id' => 5,
                'size' => 'M',
                'stock_quantity' => 30,
            ],
            [
                'name' => 'Regata Esportiva Slim – Vermelha',
                'description' => 'Regata esportiva slim na cor vermelha, ideal para atividades físicas com conforto.',
                'price' => 59.90,
                'category_id' => 5,
                'size' => 'P',
                'stock_quantity' => 1,
            ],
            [
                'name' => 'Jogger Fitness Preta – Leve',
                'description' => 'Jogger fitness preta, leve e confortável, ideal para atividades físicas e uso casual.',
                'price' => 129.90,
                'category_id' => 6,
                'size' => 'G',
                'stock_quantity' => 9,
            ],
            [
                'name' => 'Faixa Abdominal Ajustável',
                'description' => 'Faixa abdominal ajustável, ideal para suporte durante exercícios e atividades físicas.',
                'price' => 59.90,
                'category_id' => 7,
                'size' => null,
                'stock_quantity' => 20,
            ],
            [
                'name' => 'Squeeze Rosa 750ml',
                'description' => 'Squeeze rosa com capacidade de 750ml, ideal para manter-se hidratado durante os treinos.',
                'price' => 39.90,
                'category_id' => 7,
                'size' => null,
                'stock_quantity' => 40,
            ],
        ]);
    }
}
