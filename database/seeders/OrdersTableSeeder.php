<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Order;
use App\Models\User;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $users = User::pluck('id')->toArray();
        $products = Product::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            Order::create([
                'order_number' => $faker->unique()->randomNumber(),
                'total_amount' => $faker->randomFloat(2, 10, 100),
                'user_id' => $faker->randomElement($users),
                'product_id' => $faker->randomElement($products),
                'quantity' => $faker->numberBetween(1, 10),
            ]);
        }
    }

}
