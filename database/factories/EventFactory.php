<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Meetup;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Event;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('now', '+3 years')->format('Y-m-d'),
            'meetup_id' => function () {
                return Meetup::factory()->create()->id;
            },

            'meetup_com_event_id' => $this->faker->word,
            'intro' => $this->faker->paragraph,

            'schedule' => $this->faker->paragraph,
            'speaker_1_abstract' => $this->faker->paragraph,
            'speaker_2_abstract' => $this->faker->paragraph,

            'tweet' => $this->faker->sentence,
            'tweet_sent_at' => null,
        ];
    }
}
