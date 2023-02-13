<?php

namespace Database\Factories;

use App\Models\Meetup;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'meetup_com_id' => $this->faker->slug(),
        ];
    }
}
