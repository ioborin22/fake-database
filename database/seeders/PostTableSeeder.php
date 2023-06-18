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
                'title' => $faker->sentence($nbWords = 10, $variableNbWords = true),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'content' => $faker->realText($maxNbChars = 2000, $indexSize = 2),
                'user_id' => $user_id,
            ]);
        }
    }
}
