<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MessagesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $usersSender = DB::table('users')->pluck('id');
        $usersReceiver = DB::table('users')->pluck('id');

        foreach ($usersSender as $senderId) {
            foreach ($usersReceiver as $recipientId) {
                for ($i = 0; $i < 10; $i++) {
                    DB::table('messages')->insert([
                        'sender_id' => $senderId,
                        'receiver_id' => $recipientId,
                        'text_message' => $faker->sentence,
                        'flag' => $faker->boolean,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
