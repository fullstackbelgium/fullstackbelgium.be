<?php

namespace App\Http\Controllers;

use App\Http\ViewModels\HomepageViewModel;
use App\Services\Meetup\MeetupApi;

class HomeController
{
    public function __invoke()
    {
        return view('home', new HomepageViewModel());
    }
}
