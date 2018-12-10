<?php

namespace Tests\Mocks;

use PHPUnit\Framework\TestCase;

class Twitter extends \App\Services\Twitter\Twitter
{
    /** @var array */
    protected $tweets = [];

    /*
     * This avoids having to pass the constructor parameters defined in the base class
     */
    public function __construct()
    {
    }

    public function tweet(string $tweetText)
    {
        $this->tweets[] = $tweetText;
    }

    public function assertTweetsSent(array $texts)
    {
        TestCase::assertEquals($texts, $this->tweets, "Tweets were not sent");
    }

    public function assertTweetsSentCount(int $count)
    {
        TestCase::assertCount($count, $this->tweets);
    }
}
