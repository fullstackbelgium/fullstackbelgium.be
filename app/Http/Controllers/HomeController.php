<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Meetup;
use App\Services\Meetup\MeetupApi;

class HomeController
{
    public function __invoke(MeetupApi $meetupApi)
    {
        $meetups = Meetup::with('upcomingEvents', 'previousEvents')->get()->sortBy(function (Meetup $meetup) {
            return optional($meetup->upcomingEvents->first())->date;
        });

        $totalAttendees = 0;
        foreach ($meetups as $meetup) {
            $totalAttendees += $meetupApi->getAttendees($meetup->previousEvents->last());
        }

        return view('home', compact('meetups', 'totalAttendees'));
    }
}
