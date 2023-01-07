<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);
Route::view('slack', 'slack');
Route::view('contact', 'contact');
Route::view('code-of-conduct', 'code-of-conduct');
Route::view('cfp', 'cfp');

Route::redirect('/login', '/nova/login', 301)->name('login');
