<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Spatie\ResponseCache\Facades\ResponseCache;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Meetup extends Model
{
    use HasSlug;

    protected static function boot()
    {
        parent::boot();

        static::saved(function (self $self) {
            ResponseCache::clear();
        });
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class)->orderBy('date');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function eventsAfter(Carbon $date)
    {
        return $this->events()->where('date', '>=', $date);
    }

    public function upcomingEvents()
    {
        return $this->eventsAfter(Carbon::now());
    }

    public function previousEvents()
    {
        return $this->events()->where('date', '<', Carbon::now());
    }
}
