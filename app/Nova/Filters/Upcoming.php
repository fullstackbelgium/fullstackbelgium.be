<?php

namespace App\Nova\Filters;

use Carbon\Carbon;
use Laravel\Nova\Filters\BooleanFilter;
use Laravel\Nova\Http\Requests\NovaRequest;

class Upcoming extends BooleanFilter
{
    /**
     * Apply the filter to the given query.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(NovaRequest $request, $query, $value)
    {
        if (! $value['upcoming']) {
            return $query;
        }

        return $query->where('date', '>=', Carbon::now()->startOfDay());
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function options(NovaRequest $request)
    {
        return [
            'Upcoming' => 'upcoming',
        ];
    }

    public function default()
    {
        return [
            'upcoming' => true,
        ];
    }
}
