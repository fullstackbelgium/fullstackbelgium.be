<?php

use App\Models\Event;
use App\Models\Meetup;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'venue_name' => $faker->company,
        'meetup_id' => function () {
            return factory(Meetup::class)->create()->id;
        },

        'meetup_com_event_id' => $faker->word,
        'intro' => $faker->paragraph,
        'sponsors' => $faker->paragraph,

        'schedule' => $faker->paragraph,
        'speaker_1_abstract' => $faker->paragraph,
        'speaker_2_abstract' => $faker->paragraph,

        'tweet' => $faker->sentence,
        'tweet_sent_at' => null,
    ];
});
