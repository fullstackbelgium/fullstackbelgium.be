<?php

namespace App\Models;

use App\Actions\SendTweetAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledTweet extends Model
{
    use HasFactory;

    protected $casts = [
        'scheduled_to_be_sent_at' => 'datetime',
        'sent_at' => 'datetime',
    ];

    public function scopeShouldBeSent(Builder $query)
    {
        return $query
            ->whereNull('sent_at')
            ->whereTime('scheduled_to_be_sent_at', '<=', now());
    }

    public function send()
    {
        app(SendTweetAction::class)->execute($this->tweet);

        $this->sent_at = now();
        $this->save();

        return $this;
    }
}
