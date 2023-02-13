<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\Event;

class GenerateNewsletterController
{
    public function __invoke(Event $event): View
    {
        $event->load('sponsors');

        return view('admin.generate-newsletter', compact('event'));
    }
}
