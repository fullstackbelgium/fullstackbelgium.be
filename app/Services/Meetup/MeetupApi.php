<?php

namespace App\Services\Meetup;

use App\Models\Event;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class MeetupApi
{
    /** @var \GuzzleHttp\Client */
    protected $client;

    public function __construct(Client $meetupClient)
    {
        $this->client = $meetupClient;
    }

    public function updateEvent(string $meetupId, string $eventId, array $updatedProperties)
    {
        if (! app()->environment('production')) {
            return;
        }

        $this->client->patch("/{$meetupId}/events/{$eventId}", [
            'form_params' => $updatedProperties
        ]);

        return $this;
    }

    public function getAttendees(Event $event)
    {
        try {
            $response = $this->client->get("/{$event->meetup->meetup_com_id}/events/{$event->meetup_com_event_id}");
            $data = json_decode($response->getBody()->getContents(), true);
            return $data['yes_rsvp_count'];
        } catch (Exception $e) {
            //Log::error($e->getMessage());
            return 0;
        }

    }
}
