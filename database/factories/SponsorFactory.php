<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Sponsor::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
