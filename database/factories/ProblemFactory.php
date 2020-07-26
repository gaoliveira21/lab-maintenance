<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Laboratory;
use App\Models\Problem;
use Faker\Generator as Faker;

$factory->define(Problem::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'body' => $faker->paragraph(5),
        'user_id' => 1,
        'laboratory_id' => function () {
            return factory(Laboratory::class)->create()->id;
        },
        'active' => 1,
        'status' => $faker->numberBetween(0, 1)
    ];
});
