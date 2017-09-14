<?php

use Faker\Generator as Faker;
use App\Role;


$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'dob' => Carbon\Carbon::parse('31 July 1995'),
        'username' => $faker->word,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
