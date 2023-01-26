<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::factory()->count(10)->create();

        Category::factory()->create([
            'name' => 'Konsumsi',
            'slug' => Str::slug('Konsumsi'),
        ]);

        Category::factory()->create([
            'name' => 'Pembersih',
            'slug' => Str::slug('Pembersih'),
        ]);
    }
}
