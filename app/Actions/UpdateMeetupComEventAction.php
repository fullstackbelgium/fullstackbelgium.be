<?php

namespace App\Actions;

use App\Models\Event;
use App\Services\Meetup\MeetupApi;
use Exception;
use Illuminate\Support\Facades\Log;

class UpdateMeetupComEventAction
{
    protected MeetupApi $meetupApi;

    public function __construct(MeetupApi $meetupApi)
    {
        $this->meetupApi = $meetupApi;
    }

    public function execute(Event $event)
    {
        $meetupId = $event->meetup->meetup_com_id;

        $eventId = $event->meetup_com_event_id;

        // Don't update the event when it's passed
        if ($event->date && $event->date->startOfDay() <= now()->startOfDay()) {
            return;
        }

        $this->meetupApi->updateEvent($meetupId, $eventId, [
            'name' => $event->determineMeetupComName(),
            'description' => $event->meetup_com_description,
        ]);
    }
}
