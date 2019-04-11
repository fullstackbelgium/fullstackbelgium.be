<?php

use App\Http\Controllers\HomeController;

Route::get('/', HomeController::class);

Route::view('meetups', 'meetups');

Route::view('slack', 'slack');

Route::view('contact', 'contact');

Route::view('policy', 'policy');

Route::view('code-of-conduct', 'code-of-conduct');
