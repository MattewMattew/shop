<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Товар 1',
            'price' => 100.00,
            'stock' => 10
        ]);

        Product::create([
            'name' => 'Товар 2',
            'price' => 200.00,
            'stock' => 5
        ]);

        Product::create([
            'name' => 'Товар 3',
            'price' => 150.00,
            'stock' => 8
        ]);

        Product::create([
            'name' => 'Товар 4',
            'price' => 300.00,
            'stock' => 3
        ]);

        Product::create([
            'name' => 'Товар 5',
            'price' => 250.00,
            'stock' => 12
        ]);
    }
}
