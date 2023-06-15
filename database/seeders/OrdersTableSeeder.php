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

        for ($i = 0; $i < 1000; $i++) {
            $quantity = $faker->numberBetween(1, 5);
            $product_id = $faker->randomElement($products);
            $product = Product::find($product_id);
            $total_amount = $product->price * $quantity;

            $order_number = $faker->unique()->randomNumber(6);

            Order::create([
                'order_number' => $order_number,
                'total_amount' => $total_amount,
                'user_id' => $faker->randomElement($users),
                'product_id' => $product_id,
                'quantity' => $quantity,
            ]);
        }
    }

}
