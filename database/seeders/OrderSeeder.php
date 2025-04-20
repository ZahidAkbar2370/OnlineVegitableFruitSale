<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'customer_id' => User::first()->id,
            'item_id' => Item::first()->id,
            'sale_price' => Item::first()->sale_price,
            'unit' => Item::first()->unit,
        ]);
    }
}
