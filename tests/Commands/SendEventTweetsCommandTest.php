<?php

namespace Tests\Commands;

use App\Models\Event;
use Carbon\Carbon;
use Tests\TestCase;

class SendEventTweetsCommandTest extends TestCase
{
    /** @var \Tests\Mocks\Twitter */
    protected $twitter;

    public function setUp(): void
    {
        parent::setUp();

        $this->twitter = $this->fakeTwitter();

        $this->setNow('2018-01-01 00:00:00');
    }

    /** @test */
    public function it_will_tweet_an_event_that_is_happening_within_two_weeks()
    {
        $this->createEvent('2018-01-07', 'tweet this');
        $this->artisan('fullstack:send-event-tweets');
        $this->twitter->assertTweetsSent(['tweet this']);
    }

    /** @test */
    public function it_will_only_send_an_announcement_tweet_once()
    {
        $this->createEvent('2018-01-07', 'tweet this');
        $this->artisan('fullstack:send-event-tweets');
        $this->artisan('fullstack:send-event-tweets');
        $this->twitter->assertTweetsSentCount(1);
    }

    /** @test */
    public function it_will_only_send_a_tweet_if_an_event_happens_in_the_two_weeks()
    {
        $this->createEvent('2018-01-21', 'tweet this');

        $this->setNow('2018-01-06 00:00:00');
        $this->artisan('fullstack:send-event-tweets');
        $this->twitter->assertTweetsSentCount(0);

        $this->setNow('2018-01-07 00:00:00');
        $this->artisan('fullstack:send-event-tweets');
        $this->twitter->assertTweetsSentCount(1);
    }

    protected function createEvent(string $date, $tweetText = null): Event
    {
        return factory(Event::class)->create([
            'date' => Carbon::createFromFormat('Y-m-d', $date),
            'tweet' => $tweetText ?? faker()->sentence,
        ]);
    }
}
