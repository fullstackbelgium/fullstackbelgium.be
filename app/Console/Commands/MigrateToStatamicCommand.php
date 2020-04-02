<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\Sponsor;
use App\Models\Sponsorship;
use App\Models\Venue;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Statamic\Assets\Asset;
use Statamic\Facades\AssetContainer;
use Statamic\Facades\Entry;

class MigrateToStatamicCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:statamic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Sponsorship::each(function (Sponsorship $sponsorship) {
            if (! $sponsorship->event) {
                return;
            }

            /** @var \Statamic\Entries\Entry $event */
            $event = Entry::query()
                ->where('collection', 'events')
                ->where('date', $sponsorship->event->date)
                ->first();

            /** @var \Statamic\Entries\Entry $sponsor */
            $sponsor = Entry::query()
                ->where('collection', 'sponsors')
                ->where('title', $sponsorship->sponsor->name)
                ->first();

            $event->set('sponsor', $sponsor->id());
            $event->set('message', $sponsorship->message);

            $event->save();
        });
    }
}
