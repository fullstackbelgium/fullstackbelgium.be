<?php

namespace App\Models;

use App\Actions\SendTweetAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    protected $dates = [
        'date',
        'tweet_sent_at',
    ];

    public function meetup(): BelongsTo
    {
        return $this->belongsTo(Meetup::class);
    }

    public function scopeShouldBeTweeted(Builder $query)
    {
        return $query
            ->whereNull('tweet_sent_at')
            ->whereBetween('date', [now(), now()->addWeeks(2)])
            ->whereNotNull('tweet');
    }

    public function sendAnnouncementTweet()
    {
        app(SendTweetAction::class)->execute($this->tweet);

        $this->tweet_sent_at = now();
        $this->save();

        return $this;
    }
}
