<?php

namespace App\Nova;

use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Meetup extends Resource
{
    public static $model = \App\Models\Meetup::class;

    public static $title = 'name';

    public static $search = [
        'name',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            Image::make('Logo')->disk('public')->storeAs(function (NovaRequest $request) {
                return sha1($request->logo->getClientOriginalName()).'.'.$request->logo->getClientOriginalExtension();
            }),
            Text::make('Color')->hideFromIndex(),
            Text::make('Name')->sortable()->rules('required'),
            Text::make('Schedule'),
            Text::make('Meetup.com id', 'meetup_com_id')->sortable()->rules('required'),
        ];
    }
}
