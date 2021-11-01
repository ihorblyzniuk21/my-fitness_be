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
        Product::create([
            'name' => 'nutella',
            'calories'=>200,
            'carbs'=>22,
            'fat'=>43,
            'protein'=>63,
            'sodium'=>213,
            'sugar'=>122,
        ]);

        Product::create([
            'name' => 'banana',
            'calories'=>200,
            'carbs'=>22,
            'fat'=>43,
            'protein'=>63,
            'sodium'=>213,
            'sugar'=>122,
        ]);

        Product::create([
            'name' => 'egg',
            'calories'=>200,
            'carbs'=>22,
            'fat'=>43,
            'protein'=>63,
            'sodium'=>213,
            'sugar'=>122,
        ]);

        Product::create([
            'name' => 'cheese',
            'calories'=>200,
            'carbs'=>22,
            'fat'=>43,
            'protein'=>63,
            'sodium'=>213,
            'sugar'=>122,
        ]);

        Product::create([
            'name' => 'apple',
            'calories'=>200,
            'carbs'=>22,
            'fat'=>43,
            'protein'=>63,
            'sodium'=>213,
            'sugar'=>122,
        ]);
    }
}
