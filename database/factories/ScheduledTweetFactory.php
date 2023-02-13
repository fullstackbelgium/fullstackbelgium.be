<?php

namespace Database\Factories;

use App\Models\ScheduledTweet;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduledTweetFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'scheduled_to_be_sent_at' => $this->faker->dateTimeBetween('-1 year', '+1 month'),
            'tweet' => $this->faker->sentence(),
        ];
    }
}
