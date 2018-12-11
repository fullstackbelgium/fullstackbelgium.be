<?php

namespace App\Console\Commands;

use App\Models\ScheduledTweet;
use Illuminate\Console\Command;

class SendScheduledTweetsCommand extends Command
{
    protected $signature = 'fullstack:send-scheduled-tweets';

    protected $description = 'Send scheduled tweets';

    public function handle()
    {
        $this->info('Sending scheduled tweets');

        $events = ScheduledTweet::shouldBeSent()
            ->get()
            ->each
            ->send();

        $this->info("{$events->count()} scheduled tweets sent!");

        $this->info('All done!');
    }
}
