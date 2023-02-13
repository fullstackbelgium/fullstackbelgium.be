<?php

namespace App\Http\Controllers;

use App\Http\ViewModels\HomepageViewModel;
use Illuminate\View\View;

class HomeController
{
    public function __invoke(): View
    {
        return view('home', new HomepageViewModel());
    }
}
