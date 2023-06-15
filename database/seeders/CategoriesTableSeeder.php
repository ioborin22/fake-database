<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = ['Electronics', 'Clothing', 'Home Decor', 'Beauty', 'Books', 'Sports & Outdoors', 'Toys & Games', 'Health & Wellness', 'Kitchen & Dining', 'Furniture', 'Jewelry', 'Automotive'];

        $faker = Faker::create();

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'description' => $faker->sentence,
            ]);
        }
    }


}
