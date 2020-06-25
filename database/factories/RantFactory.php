<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rant;
use Faker\Generator as Faker;

$factory->define(Rant::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'body' => $faker->sentence
    ];
});
