<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserDetailsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $users = DB::table('users')->pluck('id');

        foreach ($users as $userId) {
            DB::table('user_details')->insert([
                'user_id' => $userId,
                'avatar' => $faker->imageUrl(),
                'online' => $faker->boolean,
            ]);
        }
    }
}
