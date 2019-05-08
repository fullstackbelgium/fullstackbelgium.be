<?php

namespace App\Services\Meetup;

use GuzzleHttp\Client;

class MeetupApi
{
    /** @var \GuzzleHttp\Client */
    protected $client;
    /** @var string */
    protected $apiKey;

    public function __construct(Client $client, string $apiKey)
    {
        $this->client = $client;

        $this->apiKey = $apiKey;
    }

    public function updateEvent(string $meetupId, string $eventId, array $updatedProperties)
    {
        if (! app()->environment('production')) {
            return;
        }

        $this->client->patch("/{$meetupId}/events/{$eventId}?key={$this->apiKey}", [
            'form_params' => $updatedProperties
        ]);

        return $this;
    }
}
