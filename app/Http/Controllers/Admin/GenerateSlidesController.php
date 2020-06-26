<?php

namespace App\Http\Controllers\Admin;

use Statamic\Facades\Entry;

class GenerateSlidesController
{
    public function __invoke(string $event)
    {
        $event = Entry::find($event);

        $otherGroups = Entry::query()
            ->where('collection', 'groups')
            ->where('id', '!=', $event->group)
            ->get();

        return view('admin.generate-slides', compact('event', 'otherGroups'));
    }
}
