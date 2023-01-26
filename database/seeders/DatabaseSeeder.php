<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // User
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Category
        Category::factory()->create([
            'name' => 'Konsumsi',
            'slug' => Str::slug('Konsumsi'),
        ]);

        Category::factory()->create([
            'name' => 'Pembersih',
            'slug' => Str::slug('Pembersih'),
        ]);

        // Product
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
