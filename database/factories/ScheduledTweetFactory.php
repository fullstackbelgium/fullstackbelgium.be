<?php

use App\Models\ScheduledTweet;
use Faker\Generator as Faker;

$factory->define(ScheduledTweet::class, function (Faker $faker) {
    return [
        'scheduled_to_be_sent_at' => $faker->dateTimeBetween('-1 year', '+1 month'),
        'tweet' => $faker->sentence,
    ];
});
