<?php

namespace Tests\Models;

use App\Models\Event;
use Tests\TestCase;

class EventTest extends TestCase
{
    /** @var \Tests\Mocks\MeetupApi */
    protected $meetupApi;

    /** @var \App\Models\Event */
    protected $event;

    public function setUp()
    {
        parent::setUp();

        $this->event = factory(Event::class)->create([
            'meetup_com_event_id' => faker()->word,
        ]);

        $this->meetupApi = $this->fakeMeetupApi();
    }

    /** @test */
    public function when_updating_an_event_with_a_meetup_com_event_id_it_will_update_the_event_on_meetup_com()
    {
        $this->event->intro = 'new intro';
        $this->event->save();

        $this->meetupApi->assertEventsUpdatedCount(1);
    }

    /** @test */
    public function it_will_not_try_to_update_meetup_com_when_the_event_id_is_empty()
    {
        $this->event->meetup_com_event_id = '';
        $this->event->save();
        $this->meetupApi->assertEventsUpdatedCount(0);

        $this->event->intro = 'new intro';
        $this->event->save();
        $this->meetupApi->assertEventsUpdatedCount(0);
    }
}