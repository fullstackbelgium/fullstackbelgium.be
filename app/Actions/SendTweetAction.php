<?php

namespace App\Actions;

use App\Services\Twitter\Twitter;

class SendTweetAction
{
    /** @var \App\Services\Twitter\Twitter */
    protected $twitter;

    public function __construct(Twitter $twitter)
    {
        $this->twitter = $twitter;
    }

    public function execute(string $text)
    {
        $this->twitter->tweet($text);
    }
}
