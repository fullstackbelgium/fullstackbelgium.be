<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\ViewModels\HomepageViewModel;

class HomeController
{
    public function __invoke(): View
    {
        return view('home', new HomepageViewModel());
    }
}
