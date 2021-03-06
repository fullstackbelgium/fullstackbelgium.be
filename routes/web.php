<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['cacheResponse:3600']], function () {
    Route::get('/', HomeController::class);
});

Route::view('meetups', 'meetups');
Route::view('slack', 'slack');
Route::view('contact', 'contact');
Route::view('policy', 'policy');
Route::view('code-of-conduct', 'code-of-conduct');
Route::view('cfp', 'cfp');
