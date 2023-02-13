<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Meetup;
use Illuminate\View\View;

class GenerateSlidesController
{
    public function __invoke(Event $event): View
    {
        $event->load(['sponsors', 'meetup']);
        $otherMeetups = Meetup::query()
            ->with(['events'])
            ->where('id', '!=', $event->meetup->id)
            ->get();

        return view('admin.generate-slides', compact('event', 'otherMeetups'));
    }
}
