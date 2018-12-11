<?php

use App\Models\Meetup;
use Faker\Generator as Faker;

$factory->define(Meetup::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'meetup_com_id' => $faker->slug,
    ];
});
