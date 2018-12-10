<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this
            ->call(UsersTableSeeder::class)
            ->call(MeetupsTableSeeder::class)
            ->call(EventsTableSeeder::class)
            ->call(ScheduledTweetsTableSeeder::class);
    }
}
