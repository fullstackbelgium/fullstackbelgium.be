<?php

use App\Http\Controllers\Admin\GenerateSlidesController;
use App\Http\Controllers\Admin\GenerateNewsletterController;

Route::get('generate-newsletter/{event}', GenerateNewsletterController::class);
Route::get('generate-slides/{event}', GenerateSlidesController::class);
