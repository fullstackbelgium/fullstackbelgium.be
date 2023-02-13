<?php

namespace Database\Seeders;

use App\Models\Meetup;
use Illuminate\Database\Seeder;

class MeetupsTableSeeder extends Seeder
{
    public function run(): void
    {
        Meetup::factory()->create(['name' => 'Full Stack Ghent', 'meetup_com_id' => 'fullstackghent']);
        Meetup::factory()->create(['name' => 'Full Stack Antwerp', 'meetup_com_id' => 'fullstackantwerp']);
    }
}
