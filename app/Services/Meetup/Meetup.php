<?php

namespace App\Services\Meetup;

use GuzzleHttp\Client;

class Meetup
{
    /** @var \GuzzleHttp\Client */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function updateEvent(string $meetupId, string $eventId, array $updatedProperties)
    {
        $this->client->patch("/{$meetupId}/events/{$eventId}", [
            'form_params' => $updatedProperties
        ]);

        return $this;
    }
}