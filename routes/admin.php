<?php

use App\Http\Controllers\Admin\GenerateNewsletterController;
use App\Http\Controllers\Admin\GenerateSlidesController;

Route::get('generate-newsletter/{event}', GenerateNewsletterController::class);
Route::get('generate-slides/{event}', GenerateSlidesController::class);
