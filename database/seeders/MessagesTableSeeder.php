<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MessagesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $users = DB::table('users')->pluck('id');

        foreach ($users as $userId) {
            $recipientId = $users->except($userId)->random();

            DB::table('messages')->insert([
                'receiver' => $recipientId,
                'sender' => $userId,
                'text_message' => $faker->sentence,
                'flag' => $faker->boolean,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
