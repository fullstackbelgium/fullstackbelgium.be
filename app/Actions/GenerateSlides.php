<?php

namespace App\Actions;

use App\Http\Controllers\Admin\GenerateSlidesController;
use Statamic\Actions\Action;
use Statamic\Entries\Entry;

class GenerateSlides extends Action
{
    public function redirect($items, $values)
    {
        return redirect()->action(GenerateSlidesController::class, $items[0]->id());
    }

    public function filter($item)
    {
        return $item instanceof Entry && $item->collection('events');
    }
}
