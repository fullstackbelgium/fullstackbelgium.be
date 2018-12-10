<?php

use App\Models\Meetup;
use Illuminate\Database\Seeder;

class MeetupsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Meetup::class, 3)->create();
    }
}
