<?php

namespace App\Actions;

use App\Http\Controllers\Admin\GenerateNewsletterController;
use Statamic\Actions\Action;
use Statamic\Entries\Entry;

class GenerateNewsletter extends Action
{
    protected $confirm = false;
    protected static $title = "Newsletter";

    public function visibleToBulk($items)
    {
        return count($items) === 1;
    }

    public function redirect($items, $values)
    {
        return redirect()->action(GenerateNewsletterController::class, $items[0]->id());
    }

    public function filter($item)
    {
        return $item instanceof Entry && $item->collection('events');
    }
}
