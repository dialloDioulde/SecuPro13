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
        'e_city of birth' => $faker->city,
        'e_number' => $faker->unique()->phoneNumber,
        'e_email' => $faker->unique()->safeEmail,
        'c_city' => $faker->city,
        'postal code' => $faker->numberBetween(1200, 3000),
        'e_available' => $faker->boolean,
        'e_status' => $faker->text,
        'c_adress' => $faker->address,
        'e_image' => $faker->imageUrl(),
        //
    ];
});
