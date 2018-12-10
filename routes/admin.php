<?php

use App\Http\Controllers\Admin\GenerateNewsletterController;

Route::get('generate-newsletter/{event}', GenerateNewsletterController::class);
