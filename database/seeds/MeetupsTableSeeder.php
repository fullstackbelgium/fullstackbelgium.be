<?php

use App\Models\Meetup;
use Illuminate\Database\Seeder;

class MeetupsTableSeeder extends Seeder
{
    public function run()
    {
        Meetup::factory()->count(3)->create();
    }
}
