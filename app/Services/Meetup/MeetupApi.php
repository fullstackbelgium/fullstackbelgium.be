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
            return $this;
        }

        $graphQLBody = [
            'query' => <<<'GQL'
                    mutation($input: EditEventInput!) {
                        editEvent(input: $input) {
                            errors {
                                message
                            }
                        }
                    }
                GQL,
            'variables' => [
                'input' => [
                    'eventId' => $eventId,
                    'title' => $updatedProperties['name'],
                    'description' => $updatedProperties['description'],
                ],
            ],
        ];

        $response = $this->client->post('/gql', [
            'body' => json_encode($graphQLBody),
        ]);

        return $this;
    }

    public function getAttendees(Event $event)
    {
        try {
            $graphQLBody = [
                'query' => <<<'GQL'
                        query($eventId: ID) {
                            event(id: $eventId) {
                              title
                              description
                              dateTime
                            }
                          }
                    GQL,
                'variables' => [
                    'eventId' => $event->meetup_com_event_id,
                ],
            ];

            $response = $this->client->post('/gql', [
                'body' => json_encode($graphQLBody),
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            return $data['going'] ?? 0;
        } catch (Exception $e) {
            //Log::error($e->getMessage());
            return 0;
        }
    }
}
