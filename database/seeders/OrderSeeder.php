<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'product_id' => 1,
                'quantity' => 2,
                'discount' => null,
                'total_amount' => 399.80,
                'created_at' => now(),
            ],
            [
                'product_id' => 3,
                'quantity' => 1,
                'discount' => 10.00,
                'total_amount' => 119.90,
                'created_at' => now(),
            ],
            [
                'product_id' => 7,
                'quantity' => 3,
                'discount' => null,
                'total_amount' => 419.70,
                'created_at' => now(),
            ],
            [
                'product_id' => 10,
                'quantity' => 1,
                'discount' => 5.00,
                'total_amount' => 54.90,
                'created_at' => now(),
            ],
            [
                'product_id' => 12,
                'quantity' => 2,
                'discount' => null,
                'total_amount' => 79.80,
                'created_at' => now(),
            ],
            [
                'product_id' => 5,
                'quantity' => 1,
                'discount' => 15.00,
                'total_amount' => 124.90,
                'created_at' => now(),
            ],
            [
                'product_id' => 14,
                'quantity' => 1,
                'discount' => null,
                'total_amount' => 39.90,
                'created_at' => now(),
            ],
            [
                'product_id' => 4,
                'quantity' => 2,
                'discount' => 20.00,
                'total_amount' => 259.80,
                'created_at' => now(),
            ],
            [
                'product_id' => 9,
                'quantity' => 1,
                'discount' => null,
                'total_amount' => 89.90,
                'created_at' => now(),
            ],
            [
                'product_id' => 2,
                'quantity' => 1,
                'discount' => 10.00,
                'total_amount' => 179.90,
                'created_at' => now(),
            ],


            [
                'product_id' => 6,
                'quantity' => 2,
                'discount' => null,
                'total_amount' => 259.80,
                'created_at' => now()->subMonth(),
            ],
            [
                'product_id' => 11,
                'quantity' => 1,
                'discount' => 5.00,
                'total_amount' => 124.90,
                'created_at' => now()->subMonth(),
            ],
            [
                'product_id' => 8,
                'quantity' => 3,
                'discount' => null,
                'total_amount' => 209.70,
                'created_at' => now()->subMonth(),
            ],
            [
                'product_id' => 13,
                'quantity' => 1,
                'discount' => 2.00,
                'total_amount' => 37.90,
                'created_at' => now()->subMonth(),
            ],
            [
                'product_id' => 15,
                'quantity' => 2,
                'discount' => null,
                'total_amount' => 79.80,
                'created_at' => now()->subMonth(),
            ],
        ]);
    }
}
