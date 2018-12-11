<?php

namespace Tests\Mocks;

use Tests\TestCase;

class MeetupApi extends \App\Services\Meetup\MeetupApi
{
    /** @var array */
    protected $updatedEvents;

    public function __construct()
    {
        $this->updatedEvents = [];
    }

    public function updateEvent(string $meetupId, string $eventId, array $updatedProperties)
    {
        $this->updatedEvents[$meetupId][$eventId] = $updatedProperties;
    }

    public function assertEventsUpdatedCount(int $count)
    {
        TestCase::assertCount($count, $this->updatedEvents);
    }
}