<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;

class Meetup extends Resource
{
    public static $model = \App\Models\Meetup::class;

    public static $title = 'name';

    public static $search = [
        'name',
    ];

    public function fields(Request $request)
    {
        return [
            Text::make('Name')->sortable()->rules('required'),
            Text::make('Meetup.com id', 'meetup_com_id')->sortable()->rules('required'),
        ];
    }
}
