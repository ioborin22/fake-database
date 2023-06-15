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

        for ($i = 0; $i < 20; $i++) {
            Comment::create([
                'content' => $faker->text,
                'user_id' => $faker->randomElement($users),
                'post_id' => $faker->randomElement($posts),
                'employer_id' => $faker->randomElement($employers),
                'image_id' => $faker->randomElement($images),
                'product_id' => $faker->randomElement($products),
            ]);
        }
    }
}
