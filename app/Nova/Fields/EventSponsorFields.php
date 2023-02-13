<?php

namespace App\Nova\Fields;

use Laravel\Nova\Fields\Markdown;

class EventSponsorFields
{
    /**
     * Get the pivot fields for the relationship.
     *
     * @return array
     */
    public function __invoke(): array
    {
        return [
            Markdown::make('Message'),
        ];
    }
}
