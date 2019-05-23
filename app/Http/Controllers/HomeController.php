<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Meetup;
use App\Services\Meetup\MeetupApi;

class HomeController
{
    public function __invoke()
    {
        $meetups = Meetup::with('upcomingEvents', 'previousEvents')->get()->sortBy(function (Meetup $meetup) {
            return optional($meetup->upcomingEvents->first())->date;
        });

        return view('home', compact('meetups'));
    }
}
