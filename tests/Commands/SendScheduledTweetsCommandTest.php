<?php

namespace Tests\Commands;

use App\Models\ScheduledTweet;
use Carbon\Carbon;
use Tests\TestCase;

class SendScheduledTweetsCommandTest extends TestCase
{
    /** @var \Tests\Mocks\Twitter */
    protected $twitter;

    public function setUp(): void
    {
        parent::setUp();

        $this->twitter = $this->fakeTwitter();

        $this->setNow('2018-01-15 16:00:00');
    }

    /** @test */
    public function it_will_only_send_tweets_when_they_should_be_sent()
    {
        $this->createScheduledTweet('2018-01-15 15:59:59', 'past');
        $this->createScheduledTweet('2018-01-15 16:00:00', 'current');
        $this->createScheduledTweet('2018-01-15 16:00:01', 'future');

        $this->artisan('fullstack:send-scheduled-tweets');

        $this->twitter->assertTweetsSent([
            'past',
            'current',
        ]);
    }

    /** @test */
    public function it_will_not_send_a_schedueld_tweet_that_has_already_been_sent()
    {
        $this->createScheduledTweet('2018-01-15 15:59:59', 'past');
        $this->artisan('fullstack:send-scheduled-tweets');
        $this->twitter->assertTweetsSentCount(1);

        $this->artisan('fullstack:send-scheduled-tweets');
        $this->twitter->assertTweetsSentCount(1);
    }

    protected function createScheduledTweet(string $dateTime, $tweetText = null): ScheduledTweet
    {
        return factory(ScheduledTweet::class)->create([
            'scheduled_to_be_sent_at' => Carbon::createFromFormat('Y-m-d H:i:s', $dateTime),
            'tweet' => $tweetText ?? faker()->sentence,
            'sent_at' => null,
        ]);
    }
}
