<?php

namespace App\Nova\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Filters\BooleanFilter;
use Laravel\Nova\Http\Requests\NovaRequest;

class Upcoming extends BooleanFilter
{
    /**
     * Apply the filter to the given query.
     *
     * @param  mixed  $value
     */
    public function apply(NovaRequest $request, Builder $query, $value): Builder
    {
        if (! $value['upcoming']) {
            return $query;
        }

        return $query->where('date', '>=', Carbon::now()->startOfDay());
    }

    /**
     * Get the filter's available options.
     */
    public function options(NovaRequest $request): array
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
