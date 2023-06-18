<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Image;
use App\Models\Post;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $employers = Employer::pluck('id')->toArray();
        $posts = Post::pluck('id')->toArray();
        $products = Product::pluck('id')->toArray();

        foreach ($employers as $employerId) {
            Image::create([
                'image_name' => $faker->word . '.' . $faker->fileExtension,
                'image_url' => $faker->imageUrl(640, 480, '', false, 'Fake Database API Employer ID') . $employerId,
                'employer_id' => $employerId,
                'post_id' => null,
                'product_id' => null,
            ]);
        }

        foreach ($posts as $postId) {
            Image::create([
                'image_name' => $faker->word . '.' . $faker->fileExtension,
                'image_url' => $faker->imageUrl(640, 480, '', false, 'Fake Database API Post ID') . $postId,
                'employer_id' => null,
                'post_id' => $postId,
                'product_id' => null,
            ]);
        }

        foreach ($products as $productId) {
            Image::create([
                'image_name' => $faker->word . '.' . $faker->fileExtension,
                'image_url' => $faker->imageUrl(640, 480, '', false, 'Fake Database API Product ID') . $productId,
                'employer_id' => null,
                'post_id' => null,
                'product_id' => $productId,
            ]);
        }
    }
}
