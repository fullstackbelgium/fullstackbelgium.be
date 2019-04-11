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
use Laravel\Nova\Fields\Number;
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
        'speaker_1_name',
        'speaker_1_title',
        'speaker_1_bio',
        'speaker_1_abstract',
        'speaker_2_name',
        'speaker_2_title',
        'speaker_2_bio',
        'speaker_2_abstract',
        'tweet',
    ];

    public function fields(Request $request)
    {
        return [
            new Panel("General information", function () {
                return [
                    Heading::make('General information')->onlyOnForms(),
                    Date::make('Date')->help('Will not be sent to meetup.com')->rules('required')->sortable(),
                    Text::make('', function () {
                        if (! $this->exists) {
                            return '';
                        }

                        $url = asset("storage/{$this->meetup->logo}");
                        return "<img class='h-6' src='{$url}' alt=''></a>";
                    })->asHtml()->onlyOnIndex(),
                    BelongsTo::make('Meetup')->sortable()->rules('required'),
                    Text::make('Meetup.com event id', 'meetup_com_event_id')->hideFromIndex(),
                ];
            }),

            new Panel("Venue", function () {
                return [
                    Heading::make('Venue')->onlyOnForms(),
                    Text::make('Venue name')->help('Will not be sent to meetup.com'),
                    Trix::make('Venue info')->help('Will not be sent to meetup.com. e.g. Venue will provide snacks & drinks.'),
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
                ];
            }),

            new Panel("Speaker 1", function () {
                return [
                    Heading::make('Speaker 1')->onlyOnForms(),
                    Text::make('Name', 'speaker_1_name')->hideFromIndex(),
                    Text::make('Talk title', 'speaker_1_title')->hideFromIndex(),
                    Trix::make('Abstract', 'speaker_1_abstract')->hideFromIndex(),
                    Trix::make('Bio', 'speaker_1_bio')->hideFromIndex(),
                    Number::make('Length', 'speaker_1_length')
                        ->help('Length in minutes')
                        ->hideFromIndex(),
                ];
            }),

            new Panel("Speaker 2", function () {
                return [
                    Heading::make('Speaker 2')->onlyOnForms(),
                    Text::make('Name', 'speaker_2_name')->hideFromIndex(),
                    Text::make('Talk title', 'speaker_2_title')->hideFromIndex(),
                    Trix::make('Abstract', 'speaker_2_abstract')->hideFromIndex(),
                    Trix::make('Bio', 'speaker_2_bio')->hideFromIndex(),
                    Number::make('Length', 'speaker_2_length')
                        ->help('Length in minutes')
                        ->hideFromIndex(),
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

                        return '<a target="fullstack_belgium_newsletter" title="Newsletter" href="' . action(GenerateNewsletterController::class, $this->id) . '"><img class="h-6" src="/svg/newsletter.svg" alt=""></a>';
                    })->asHtml(),

                    Text::make('', function () {
                        if (! $this->exists) {
                            return '';
                        }

                        return '<a target="fullstack_belgium_meetup" title="Meetup.com" href="' . $this->meetup_com_url . '"><img class="h-6" src="/svg/meetup.svg" alt=""></a>';
                    })->asHtml(),
                      
                    Text::make('', function () {
                        if (! $this->exists) {
                            return '';
                        }
                                 
                        return '<a target="fullstack_belgium_slides" title="Slides" href="' . action(GenerateSlidesController::class, $this->id) . '"><img class="h-6" src="/svg/slides.svg" alt=""></a>';
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
