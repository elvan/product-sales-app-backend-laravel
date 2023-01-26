<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->create([
            'name' => 'Kopi',
            'price' => 20000,
            'quantity_in_stock' => 100,
            'category_id' => 1,
        ]);

        Product::factory()->create([
            'name' => 'Teh',
            'price' => 12500,
            'quantity_in_stock' => 100,
            'category_id' => 1,
        ]);

        Product::factory()->create([
            'name' => 'Pasta Gigi',
            'price' => 9500,
            'quantity_in_stock' => 100,
            'category_id' => 2,
        ]);

        Product::factory()->create([
            'name' => 'Sabun Mandi',
            'price' => 27500,
            'quantity_in_stock' => 100,
            'category_id' => 2,
        ]);

        Product::factory()->create([
            'name' => 'Sampo',
            'price' => 22500,
            'quantity_in_stock' => 100,
            'category_id' => 2,
        ]);
    }
}
