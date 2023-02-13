<?php

namespace App\Console\Commands;

use App\Models\Event;
use Illuminate\Console\Command;

class SendEventTweetsCommand extends Command
{
    protected $signature = 'fullstack:send-event-tweets';

    protected $description = 'Send tweets to announce events';

    public function handle(): void
    {
        $this->info('Sending announcement tweets');

        $events = Event::shouldBeTweeted()
            ->get()
            ->each
            ->sendAnnouncementTweet();

        $this->info("{$events->count()} tweets sent!");

        $this->info('All done!');
    }
}
