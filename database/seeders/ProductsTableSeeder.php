<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;
use App\Models\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $categories = Category::pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'brand' => $faker->company,
                'price' => $faker->randomFloat(2, 10, 100),
                'category_id' => $faker->randomElement($categories),
            ]);
        }
    }
}
