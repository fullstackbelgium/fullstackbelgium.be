<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Meetup extends Model
{
    use HasSlug;

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

    public function eventAfter(Event $event)
    {
        return $this->events()->where('date', '>', $event->date)->first();
    }
}
