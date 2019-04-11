<?php

namespace App\Nova\Fields;

use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;

class EventSponsorFields
{
    /**
     * Get the pivot fields for the relationship.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            Markdown::make('Message'),
        ];
    }
}
