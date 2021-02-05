<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ScheduledTweet;

class ScheduledTweetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ScheduledTweet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'scheduled_to_be_sent_at' => $this->faker->dateTimeBetween('-1 year', '+1 month'),
            'tweet' => $this->faker->sentence,
        ];
    }
}
