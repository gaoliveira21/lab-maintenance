<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Laboratory;
use Faker\Generator as Faker;

$factory->define(Laboratory::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'active' => 1
    ];
});
