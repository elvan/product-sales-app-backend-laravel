<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Database\Seeder;

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
        $this->call([
            CategorySeeder::class,
        ]);

        // Product
        $this->call([
            ProductSeeder::class,
        ]);

        // $this->call([
        //     TransactionSeeder::class,
        // ]);
    }
}
