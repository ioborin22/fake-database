<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Models\Post;
use App\Models\Employer;
use App\Models\Image;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $users = User::pluck('id')->toArray();
        $posts = Post::pluck('id')->toArray();
        $employers = Employer::pluck('id')->toArray();
        $images = Image::pluck('id')->toArray();
        $products = Product::pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            Comment::create([

                'employer_id' => $faker->randomElement($employers),
                'image_id' => $faker->randomElement($images),
                'post_id' => $faker->randomElement($posts),
                'product_id' => $faker->randomElement($products),
                'user_id' => $faker->randomElement($users),
                'rating' => $faker->numberBetween(1, 5),
                'comment' => $faker->text,
            ]);
        }
    }

}
