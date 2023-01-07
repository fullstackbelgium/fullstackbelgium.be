<?php

namespace App\Http\Controllers;

use App\Http\ViewModels\HomepageViewModel;

class HomeController
{
    public function __invoke()
    {
        return view('home', new HomepageViewModel());
    }
}
