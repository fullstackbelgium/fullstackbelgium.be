<?php

namespace App\Nova;

use App\Http\Controllers\Admin\GenerateNewsletterController;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Event extends Resource
{
    public static $model = \App\Models\Event::class;

    public static $title = 'id';

    public static $search = [
        'venue_name',
        'intro',
        'sponsors',
        'speaker_1_abstract',
        'speaker_2_abstract',
        'tweet',
    ];

    public function fields(Request $request)
    {
        return [
            Date::make('Date')->sortable()->rules('required'),
            BelongsTo::make('Meetup')->sortable()->rules('required'),
            Text::make('Venue name'),

            Markdown::make('Intro')->hideFromIndex(),
            Markdown::make('Sponsors')->hideFromIndex(),

            Markdown::make('Schedule')->hideFromIndex(),
            Markdown::make('Speaker 1 abstract')->hideFromIndex(),
            Markdown::make('Speaker 2 abstract')->hideFromIndex(),

            Textarea::make('Tweet'),

            Text::make('', function () {
                if (! $this->exists) {
                    return '';
                }

                return '<a target="fullstack_belgium_newsletter" href="' . action(GenerateNewsletterController::class, $this->id) . '">Newsletter</a>';
            })->asHtml(),

            Boolean::make('Tweet sent', function () {
                return ! is_null($this->tweet_sent_at);
            })
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        if (empty($request->get('orderBy'))) {
            $query->getQuery()->orders = [];

            return $query->orderByDesc('date');
        }



        return $query;
    }
}
