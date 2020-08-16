<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'e_card_id' => $faker->unique()->randomLetter,
        'e_last_name' => $faker->name,
        'e_first_name' => $faker->lastName,
        'e_birthday_date' => $faker->dateTime(),
        'e_city_of_birth' => $faker->city,
        'e_number' => $faker->unique()->phoneNumber,
        'e_email' => $faker->unique()->safeEmail,
        'e_city' => $faker->city,
        'e_postal_code' => $faker->numberBetween(1200, 3000),
        'e_status' => $faker->state,
        'e_adress' => $faker->address,
        //
    ];
});
