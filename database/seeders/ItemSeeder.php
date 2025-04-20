<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'category_id' => Category::first()->id,
            'item_name' => 'Artichoke',
            'slug' => Str::slug('Artichoke'),
            'sale_price' => 100,
            'unit' => '1 kg',
            'description' => 'The artichoke, also known by the other names: French artichoke, globe artichoke, and green artichoke in the United States, is a variety of a species of thistle cultivated as food.',
        ]);
    }
}
