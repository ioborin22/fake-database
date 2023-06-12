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
            $blockContactId = null;

            if ($faker->boolean(50)) {
                // Set block_contact_id to null if contact_id is not null
                $blockContactId = $faker->numberBetween(1, 100);
                $contactId = null;
            }

            DB::table('contacts')->insert([
                'user_id' => $userId,
                'contact_id' => $contactId,
                'block_contact_id' => $blockContactId,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now')
            ]);
        }
    }

}

