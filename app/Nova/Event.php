<?php

namespace App\Nova;

use App\Http\Controllers\Admin\GenerateNewsletterController;
use App\Nova\Fields\EventSponsorFields;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Event extends Resource
{
    public static $model = \App\Models\Event::class;

    public static $title = 'name';

    public static $search = [
        'venue_name',
        'intro',
        'speaker_1_abstract',
        'speaker_2_abstract',
        'tweet',
    ];

    public function fields(Request $request)
    {
        return [
            Text::make('Name')->help('Will not be sent to meetup.com')->rules('required'),

            BelongsTo::make('Meetup')->sortable()->rules('required'),
            Text::make('Meetup.com event id', 'meetup_com_event_id'),
            Text::make('Venue name')->help('Will not be sent to meetup.com'),

            Trix::make('Intro')->hideFromIndex(),

            BelongsToMany::make('Sponsors')
                ->fields(new EventSponsorFields),

            Trix::make('Schedule')->hideFromIndex(),
            Trix::make('Speaker 1 abstract')->hideFromIndex(),
            Trix::make('Speaker 2 abstract')->hideFromIndex(),

            Textarea::make('Tweet'),

            Text::make('', function () {
                if (! $this->exists) {
                    return '';
                }

                return '<a target="fullstack_belgium_newsletter" href="' . action(GenerateNewsletterController::class, $this->id) . '">Newsletter</a>';
            })->asHtml(),

            Text::make('', function () {
                if (! $this->exists) {
                    return '';
                }

                return '<a target="fullstack_belgium_meetup" href="' . $this->meetup_com_url . '">Meetup.com</a>';
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

            return $query->orderByDesc('name');
        }



        return $query;
    }
}
