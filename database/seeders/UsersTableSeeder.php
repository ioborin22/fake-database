<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            $emailVerifiedAt = $faker->dateTimeBetween('-1 year', 'now');

            // Generate a random date or set it as null
            $emailVerifiedAt = $faker->optional(0.8, null)->dateTimeBetween('-1 year', 'now');

            DB::table('users')->insert([
                'nickname' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                'updated_at' => now(),
                'email_verified_at' => $emailVerifiedAt,
            ]);
        }
    }
}
