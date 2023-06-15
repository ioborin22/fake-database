<?php

namespace Database\Seeders;

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

        $posts = Post::all();

        foreach ($posts as $post) {
            for ($i = 0; $i < 3; $i++) {
                $filename = $faker->word . '.' . $faker->fileExtension;
                $employerId = $faker->numberBetween(1, 100);
                $orderId = $faker->numberBetween(1, 10); // Assuming the maximum order_id value is 100

                Image::create([
                    'filename' => $filename,
                    'url' => $faker->imageUrl(),
                    'employer_id' => $employerId,
                    'order_id' => $orderId,
                    'post_id' => $post->id,
                ]);
            }
        }
    }
}
