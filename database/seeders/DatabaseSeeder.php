<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this
            ->call(UsersTableSeeder::class)
            ->call(MeetupsTableSeeder::class)
            ->call(EventsTableSeeder::class)
            ->call(SponsorTableSeeder::class)
            ->call(ScheduledTweetsTableSeeder::class);
    }
}
