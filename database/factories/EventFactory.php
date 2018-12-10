<?php

use App\Models\Event;
use App\Models\Meetup;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'venue_name' => $faker->company,
        'meetup_id' => function () {
            return factory(Meetup::class)->create()->id;
        },
        'date' => $faker->dateTimeBetween('-2 years', '+ 6 month'),
        'intro' => $faker->paragraph,

        'speaker_1_name' => $faker->name,
        'speaker_1_abstract' => $faker->paragraph,
        'speaker_2_name' => $faker->name,
        'speaker_2_abstract' => $faker->paragraph,

        'tweet' => $faker->sentence,
        'tweet_sent_at' => null,
    ];
});
