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

        for ($i = 1; $i <= 100; $i++) {
            $addedContacts = ($i === 1) ? $faker->numberBetween(5, 9) : $faker->numberBetween(0, 4);
            $blockedContacts = ($i === 1) ? $faker->numberBetween(1, 3) : $faker->numberBetween(0, 2);

            // Create added contacts
            for ($j = 0; $j < $addedContacts; $j++) {
                $contactId = $faker->numberBetween(1, 100);

                DB::table('contacts')->insert([
                    'user_id' => $i,
                    'contact_id' => $contactId,
                    'relationship' => 'added',
                    'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                    'updated_at' => now(),
                ]);
            }

            // Create blocked contacts
            for ($k = 0; $k < $blockedContacts; $k++) {
                $contactId = $faker->numberBetween(1, 100);

                DB::table('contacts')->insert([
                    'user_id' => $i,
                    'contact_id' => $contactId,
                    'relationship' => 'blocked',
                    'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                    'updated_at' => now(),
                ]);
            }
        }
    }

}
