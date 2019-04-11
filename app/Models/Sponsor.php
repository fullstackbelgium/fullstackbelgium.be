<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sponsor extends Model
{
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'sponsorships')
            ->withPivot('message')
            ->withTimestamps();
    }
}
