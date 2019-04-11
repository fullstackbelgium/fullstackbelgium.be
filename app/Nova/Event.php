<?php

namespace App\Nova;

use App\Http\Controllers\Admin\GenerateNewsletterController;
use App\Http\Controllers\Admin\GenerateSlidesController;
use App\Nova\Fields\EventSponsorFields;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Event extends Resource
{
    public static $model = \App\Models\Event::class;

    public static $title = 'date';

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
            new Panel("General information", function () {
                return [
                    Heading::make('General information')->onlyOnForms(),
                    Date::make('Date')->help('Will not be sent to meetup.com')->rules('required'),
                    BelongsTo::make('Meetup')->sortable()->rules('required'),
                    Text::make('Meetup.com event id', 'meetup_com_event_id'),
                ];
            }),

            new Panel("Venue", function () {
                return [
                    Heading::make('Venue')->onlyOnForms(),
                    Text::make('Venue name')->help('Will not be sent to meetup.com'),
                    Image::make('Venue logo')
                      ->disk('public')->storeAs(function (Request $request) {
                          return sha1($request->venue_logo->getClientOriginalName()) . '.' . $request->venue_logo->getClientOriginalExtension();
                      })
                      ->hideFromIndex()
                      ->help('Will not be sent to meetup.com'),
                ];
            }),

            new Panel("Event details", function () {
                return [
                    Heading::make('Event details')->onlyOnForms(),
                    Trix::make('Intro')->hideFromIndex(),
                    BelongsToMany::make('Sponsors')
                      ->fields(new EventSponsorFields),

                    Trix::make('Schedule')->hideFromIndex(),
                    Trix::make('Speaker 1 abstract')->hideFromIndex(),
                    Trix::make('Speaker 2 abstract')->hideFromIndex(),
                ];
            }),

            new Panel('Extra', function () {
                return [
                    Heading::make('Extra')->onlyOnForms(),
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
                      
                    Text::make('', function () {
                        if (! $this->exists) {
                            return '';
                        }
                                 
                        return '<a target="fullstack_belgium_slides" href="' . action(GenerateSlidesController::class, $this->id) . '">Slides</a>';
                    })->asHtml(),

                    Boolean::make('Tweet sent', function () {
                        return ! is_null($this->tweet_sent_at);
                    })
                ];
            }),

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
