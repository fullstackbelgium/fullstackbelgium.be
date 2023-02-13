<?php

namespace App\Http\ViewModels;

use App\Models\Event;
use App\Models\Meetup;
use App\Models\Sponsor;
use App\Services\Meetup\MeetupApi;
use Spatie\SchemaOrg\Schema;
use Spatie\ViewModels\ViewModel;

class HomepageViewModel extends ViewModel
{
    /** @var \Illuminate\Database\Eloquent\Collection */
    private $meetups;

    public function __construct()
    {
        $this->meetups = Meetup::with('upcomingEvents', 'previousEvents')->get()->sortBy(function (Meetup $meetup) {
            return $meetup->upcomingEvents->first()?->date;
        });
    }

    public function meetups()
    {
        return $this->meetups;
    }

    public function totalAttendees(): int
    {
        return cache()->remember('total-attendees', now()->addWeek(), function () {
            $totalAttendees = 0;

            foreach ($this->meetups as $meetup) {
                if ($event = $meetup->previousEvents->last()) {
                    $totalAttendees += app(MeetupApi::class)->getAttendees($event);
                }
            }

            return $totalAttendees;
        });
    }

    public function schemaOrg(): string
    {
        return $this->meetups->flatMap(function (Meetup $meetup) {
            return $meetup->upcomingEvents->map(function (Event $event) use ($meetup) {
                /** @var \Illuminate\Support\Carbon $startDate */
                $startDate = $event->date;
                $startDate->setHour(19)->setMinutes(0)->setSeconds(0);
                $endDate = $startDate->copy()->setHour(22);

                $performers = [];
                if ($event->speaker_1_name) {
                    $performers[] = Schema::person()
                        ->name($event->speaker_1_name)
                        ->url("https://twitter.com/{$event->speaker_1_twitter}")
                        ->description($event->speaker_1_bio);
                }

                if ($event->speaker_2_name) {
                    $performers[] = Schema::person()
                        ->name($event->speaker_2_name)
                        ->url("https://twitter.com/{$event->speaker_2_twitter}")
                        ->description($event->speaker_2_bio);
                }

                /** @var \App\Models\Event $event */
                $socialEvent = Schema::socialEvent()
                    ->name($meetup->name)
                    ->description($event->intro)
                    ->performers($performers)
                    ->startDate($startDate)
                    ->endDate($endDate)
                    ->url($event->meetup_com_url)
                    ->image(Schema::imageObject()->url(asset('/storage/'.$meetup->logo)))
                    ->location(
                        Schema::place()
                            ->name($event->venue ? $event->venue->name : '')
                            ->image($event->venue ? Schema::imageObject()->url(asset('/storage/'.$event->venue->logo)) : '')
                            ->address(
                                Schema::postalAddress()
                                    ->addressCountry('Belgium')
                                    ->addressLocality(str_replace('Full Stack ', '', $meetup->name)),
                            ),
                    )
                    ->doorTime($startDate)
                    ->isAccessibleForFree(true)
                    ->organizer([
                        Schema::person()->name('Dries Vints')->url('https://driesvints.com'),
                        Schema::person()->name('Rias Van der Veken')->url('https://rias.be'),
                        Schema::person()->name('Freek Van der Herten')->url('https://freek.dev'),
                    ]);

                $sponsors = $event->sponsors->map(function (Sponsor $sponsor) {
                    return Schema::organization()
                        ->name($sponsor->name)
                        ->image(Schema::imageObject()->url(asset('/storage/'.$sponsor->logo)));
                });

                if (count($sponsors) > 0) {
                    $socialEvent->sponsor($sponsors);
                }

                return $socialEvent->toScript();
            });
        })->join('');
    }
}
