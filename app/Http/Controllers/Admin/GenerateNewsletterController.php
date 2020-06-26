<?php

namespace App\Http\Controllers\Admin;

use Statamic\Facades\Entry;

class GenerateNewsletterController
{
    public function __invoke(string $event)
    {
        $event = Entry::find($event);

        return view('admin.generate-newsletter', compact('event'));
    }
}
