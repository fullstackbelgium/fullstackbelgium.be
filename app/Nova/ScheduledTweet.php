<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ScheduledTweet extends Resource
{
    public static $model = \App\Models\ScheduledTweet::class;

    public static $title = 'tweet';

    public static $search = [
        'tweet',
    ];

    public static function label()
    {
        return 'Scheduled Tweets';
    }

    public function fields(NovaRequest $request)
    {
        return [
            DateTime::make('Scheduled for', 'scheduled_to_be_sent_at')
                ->sortable()
                ->rules('required'),

            Text::make('Tweet')->rules('required'),

            Boolean::make('Sent', function () {
                return ! is_null($this->sent_at);
            }),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        if (empty($request->get('orderBy'))) {
            $query->getQuery()->orders = [];

            return $query->orderByDesc('scheduled_to_be_sent_at');
        }

        return $query;
    }
}
