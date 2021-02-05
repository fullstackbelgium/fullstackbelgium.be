<?php

namespace Database\Seeders;

use App\Models\ScheduledTweet;
use Illuminate\Database\Seeder;

class ScheduledTweetsTableSeeder extends Seeder
{
    public function run()
    {
        ScheduledTweet::factory()->count(20)->create();
    }
}
