<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;

class GenerateNewsletterController
{
    public function __invoke(Event $event)
    {
        return view('admin.generate-newsletter', compact('event'));
    }
}