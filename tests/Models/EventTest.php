<?php

namespace Tests\Models;

use App\Models\Event;
use App\Models\Venue;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /** @var \Tests\Mocks\MeetupApi */
    protected $meetupApi;

    /** @var \App\Models\Event */
    protected $event;

    protected function setUp(): void
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
        Event::flushEventListeners();
        Event::boot();

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

    /** @test */
    public function it_can_generate_the_name_for_meetup_com()
    {
        /** @var Event $event */
        $event = factory(Event::class)->create([
            'date' => Carbon::createFromFormat('Ymd', '20180201'),
        ]);

        $this->assertEquals('February Event at TBD', $event->determineMeetupComName());

        $event->update(['venue_id' => Venue::create(['name' => 'Spatie'])->id]);

        $this->assertEquals('February Event at Spatie', $event->fresh()->determineMeetupComName());
    }
}
