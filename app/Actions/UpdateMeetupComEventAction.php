<?php

namespace App\Actions;

use App\Models\Event;
use App\Services\Meetup\MeetupApi;
use Exception;
use Illuminate\Support\Facades\Log;
use Statamic\Entries\Entry;

class UpdateMeetupComEventAction
{
    /** @var \App\Services\Meetup\MeetupApi */
    protected $meetupApi;

    public function __construct(MeetupApi $meetupApi)
    {
        $this->meetupApi = $meetupApi;
    }

    public function execute(Entry $event)
    {
        $group = \Statamic\Facades\Entry::find($event->group);

        $meetupId = $group->meetup_com_id;
        $eventId = $event->meetup_com_id;

        // Don't update the event when it's passed
        if ($event->date() && $event->date()->startOfDay() <= now()->startOfDay()) {
            return;
        }

        $name = "{$event->date()->format('F')} Event";

        if ($event->venue) {
            $venue = \Statamic\Facades\Entry::find($event->venue);
            $name .= " at {$venue->title}";
        } else {
            $name .= " at TBD";
        }

        $description = view('admin.generate-meetup-com-description', ['event' => $event]);
        $description = strip_tags($description, '<br><p>');

        $this->meetupApi->updateEvent($meetupId, $eventId, [
            'name' => $name,
            'description' => $description,
        ]);
    }
}
