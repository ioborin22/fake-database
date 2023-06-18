<?php

namespace Database\Seeders;

use App\Models\Employer;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserDetailsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $employers = Employer::all();
        $employerNames = $employers->pluck('name');

        $users = DB::table('users')->pluck('id');

        foreach ($users as $userId) {
            $dateOfBirth = $faker->date('Y-m-d', '-18 years');

            // Calculate age based on the date of birth
            $age = Carbon::parse($dateOfBirth)->age;

            $employer = $employers->random();

            DB::table('user_details')->insert([
                'user_id' => $userId,
                'first_name' => $faker->firstName,
                'middle_name' => $faker->lastName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $dateOfBirth,
                'age' => $age,
                'street_number' => $faker->buildingNumber,
                'unit_number' => $faker->secondaryAddress,
                'city' => $faker->city,
                'state' => $faker->stateAbbr,
                'zipcode' => $faker->postcode,
                'relation_to_household_head' => $faker->randomElement(['Spouse', 'Child', 'Sibling', 'Parent']),
                'sex' => $faker->randomElement(['Male', 'Female']),
                'race_ethnicity' => $faker->randomElement(['Caucasian', 'African American', 'Hispanic', 'Asian']),
                'ssn' => $faker->numerify('###-##-####'),
                'employer_id' => $employer->id,
                'employer_name' => $employer->name,
                'income' => $faker->numberBetween(20000, 100000),
                'avatar' => $faker->imageUrl(640, 480, '', false, 'Fake Database API User ID') . $userId,
                'online' => $faker->boolean
            ]);
        }
    }

}
