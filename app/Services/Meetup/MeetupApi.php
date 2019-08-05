<?php

namespace App\Services\Meetup;

use App\Models\Event;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use kamermans\OAuth2\GrantType\RefreshToken;
use kamermans\OAuth2\OAuth2Middleware;

class MeetupApi
{
    /** @var \GuzzleHttp\Client */
    protected $client;

    public function __construct(Client $meetupClient)
    {
        $client = new Client([
            // URL for access_token request
            'base_uri' => 'https://secure.meetup.com/oauth2/access',
        ]);

        $oauthConfig = [
            'client_id' => config('services.meetup.key'),
            'client_secret' => config('services.meetup.secret'),
            'refresh_token' => config('services.meetup.refresh_token'),
            'scope' => 'ageless+basic+event_management',
        ];

        $refreshToken = new RefreshToken($client, $oauthConfig);
        $oAuth2Middleware = new OAuth2Middleware($refreshToken);

        $this->client = $meetupClient;
        $this->client->getConfig('handler')->push($oAuth2Middleware);
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
            Log::error($e->getMessage());
            return 0;
        }

    }
}
