<?php

use App\Models\ScheduledTweet;
use Illuminate\Database\Seeder;

class ScheduledTweetsTableSeeder extends Seeder
{
    public function run()
    {
        factory(ScheduledTweet::class, 20)->create();
    }
}
