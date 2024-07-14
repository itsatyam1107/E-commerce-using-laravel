<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Product',
                'description' => 'Description for product 1',
                'price' => 100.00,
                'quantity' => 10,
                'img' => 'https://picsum.photos/536/354', // Add image URL
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Product 2',
                'description' => 'Description for product 2',
                'price' => 150.00,
                'quantity' => 5,
                'img' => 'https://picsum.photos/536/354', // Add image URL
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
