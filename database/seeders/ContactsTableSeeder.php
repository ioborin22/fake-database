<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            $userId = $faker->numberBetween(1, 100);
            $contactId = $faker->numberBetween(1, 100);

            $relationship = $faker->randomElement(['added', 'blocked']);

            DB::table('contacts')->insert([
                'user_id' => $userId,
                'contact_id' => $contactId,
                'relationship' => $relationship,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}
