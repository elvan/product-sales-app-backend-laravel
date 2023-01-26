<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::factory()->create([
            'customer_name' => 'Customer 1',
            'total_price' => 100000,
            'items_quantity' => 10,
            'completed_at' => '2021-05-01 00:00:00',
        ]);

        Transaction::factory()->create([
            'customer_name' => 'Customer 2',
            'total_price' => 190000,
            'items_quantity' => 19,
            'completed_at' => '2021-05-05 00:00:00',
        ]);

        Transaction::factory()->create([
            'customer_name' => 'Customer 3',
            'total_price' => 135000,
            'items_quantity' => 15,
            'completed_at' => '2021-05-10 00:00:00',
        ]);

        Transaction::factory()->create([
            'customer_name' => 'Customer 4',
            'total_price' => 190000,
            'items_quantity' => 20,
            'completed_at' => '2021-05-11 00:00:00',
        ]);

        Transaction::factory()->create([
            'customer_name' => 'Customer 5',
            'total_price' => 300000,
            'items_quantity' => 30,
            'completed_at' => '2021-05-11 00:00:00',
        ]);

        Transaction::factory()->create([
            'customer_name' => 'Customer 6',
            'total_price' => 250000,
            'items_quantity' => 25,
            'completed_at' => '2021-05-12 00:00:00',
        ]);

        Transaction::factory()->create([
            'customer_name' => 'Customer 7',
            'total_price' => 40500,
            'items_quantity' => 5,
            'completed_at' => '2021-05-12 00:00:00',
        ]);
    }
}
