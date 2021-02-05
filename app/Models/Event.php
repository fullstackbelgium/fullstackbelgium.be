<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Actions\SendTweetAction;
use App\Actions\UpdateMeetupComEventAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\ResponseCache\Facades\ResponseCache;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'date',
        'tweet_sent_at',
    ];

    protected $attributes = [
        'schedule' => '19:00 Doors Open<br />20:00 Start Talks',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saved(function (self $event) {
            ResponseCache::clear();

            if (empty($event->meetup_com_event_id)) {
                return;
            }

            app(UpdateMeetupComEventAction::class)->execute($event);
        });
    }

    public function meetup(): BelongsTo
    {
        return $this->belongsTo(Meetup::class);
    }

    public function sponsors(): BelongsToMany
    {
        return $this->belongsToMany(Sponsor::class, 'sponsorships')
            ->withPivot('message')
            ->withTimestamps();
    }

    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
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

    public function getMeetupComDescriptionAttribute(): string
    {
        $html = view('admin.generate-meetup-com-description', ['event' => $this]);

        return strip_tags($html, '<br><p>');
    }

    public function determineMeetupComName(): string
    {
        $name = "{$this->date->format('F')} Event";

        $name .= $this->venue ? " at {$this->venue->name}" : ' at TBD';

        return $name;
    }

    public function getMeetupComUrlAttribute(): string
    {
        return "https://meetup.com/{$this->meetup->meetup_com_id}/events/{$this->meetup_com_event_id}";
    }

    public function getNameAttribute(): string
    {
        return "{$this->meetup->name} {$this->date->format('d/m/Y')}";
    }
}
