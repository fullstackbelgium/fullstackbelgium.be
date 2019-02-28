<?php

namespace App\Actions;

use App\Models\Event;
use App\Services\Meetup\MeetupApi;
use Exception;

class UpdateMeetupComEventAction
{
    /** @var \App\Services\Meetup\MeetupApi */
    protected $meetupApi;

    public function __construct(MeetupApi $meetupApi)
    {
        $this->meetupApi = $meetupApi;
    }

    public function execute(Event $event)
    {
        $meetupId = $event->meetup->meetup_com_id;

        $eventId = $event->meetup_com_event_id;

        try {
            $this->meetupApi->updateEvent($meetupId, $eventId, [
                'description' => $event->meetup_com_description,
            ]);
        } catch (Exception $exception)
        {
            report($exception);
        }

    }
}
