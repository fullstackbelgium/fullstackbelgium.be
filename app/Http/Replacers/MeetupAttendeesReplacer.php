<?php

namespace App\Http\Replacers;

use App\Models\Meetup;
use App\Services\Meetup\MeetupApi;
use Spatie\ResponseCache\Replacers\Replacer;
use Symfony\Component\HttpFoundation\Response;

class MeetupAttendeesReplacer implements Replacer
{
    /** @var \App\Services\Meetup\MeetupApi */
    private $meetupApi;

    public function __construct(MeetupApi $meetupApi)
    {
        $this->meetupApi = $meetupApi;
    }

    public function prepareResponseToCache(Response $response): void
    {
    }

    public function replaceInCachedResponse(Response $response): void
    {
        if ($response->getContent()) {
            $response->setContent(str_replace(
                $this->searchFor(),
                $this->calculateTotalAttendees(),
                $response->getContent()
            ));
        }
    }

    protected function searchFor(): string
    {
        return "<total-attendees />";
    }

    protected function calculateTotalAttendees(): int
    {
        $meetups = Meetup::with('upcomingEvents', 'previousEvents')->get()->sortBy(function (Meetup $meetup) {
            return optional($meetup->upcomingEvents->first())->date;
        });

        $totalAttendees = 0;
        foreach ($meetups as $meetup) {
            $totalAttendees += $this->meetupApi->getAttendees($meetup->previousEvents->last());
        }

        return $totalAttendees;
    }
}