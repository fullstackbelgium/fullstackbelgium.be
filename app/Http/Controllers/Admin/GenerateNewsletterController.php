<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\View\View;

class GenerateNewsletterController
{
    public function __invoke(Event $event): View
    {
        $event->load('sponsors');

        return view('admin.generate-newsletter', compact('event'));
    }
}
