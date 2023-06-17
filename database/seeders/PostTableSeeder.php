<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Post;
use App\Models\User;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            $user_id = $faker->numberBetween(1, 100);

            Post::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'content' => $faker->text,
                'user_id' => $user_id,
            ]);
        }
    }
}


