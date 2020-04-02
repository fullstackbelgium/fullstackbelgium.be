<?php

namespace App\Http\ViewModels;

use App\Services\Meetup\MeetupApi;
use Spatie\SchemaOrg\Schema;
use Statamic\Entries\Entry;
use Statamic\Facades\Entry as EntryFacade;
use Statamic\View\ViewModel;

class HomepageViewModel extends ViewModel
{
    /** @var \Illuminate\Database\Eloquent\Collection */
    private $meetups;

    /** @var \App\Services\Meetup\MeetupApi */
    private $meetupApi;

    public function __construct()
    {
        $this->meetups = EntryFacade::query()
            ->where('collection', 'groups')
            ->get()
            ->sortBy(function (Entry $group) {
                $nextEvent = \Statamic\Facades\Entry::query()
                    ->where('collection', 'events')
                    ->where('group', $group->id())
                    ->where('date', '>=', now()->startOfDay())
                    ->first();

                return $nextEvent->date();
            });

        $this->meetupApi = app(MeetupApi::class);
    }

    public function data(): array
    {
        return [
            'meetups' => $this->meetups,
            'totalAttendees' => $this->totalAttendees(),
            'schemaOrg' => $this->schemaOrg(),
        ];
    }

    public function totalAttendees(): int
    {
        return cache()->remember('total-attendees', now()->addDay(), function () {
            $totalAttendees = 0;

            foreach ($this->meetups as $meetup) {
                $previousEvent = EntryFacade::query()
                    ->where('collection', 'events')
                    ->where('date', '<', now())
                    ->where('group', $meetup->id())
                    ->orderBy('date', 'desc')
                    ->first();

                $totalAttendees += $this->meetupApi->getAttendees($meetup, $previousEvent);
            }

            return $totalAttendees;
        });
    }

    public function schemaOrg(): string
    {
        return $this->meetups->flatMap(function (Entry $meetup) {
            $meetupData = $meetup->toAugmentedArray();
            $upcomingEvents = EntryFacade::query()
                ->where('collection', 'events')
                ->where('date', '>=', now())
                ->where('group', $meetup->id())
                ->get();

            return $upcomingEvents->map(function (Entry $event) use ($meetup, $meetupData) {
                $eventData = $event->toAugmentedArray();

                /** @var \Illuminate\Support\Carbon $startDate */
                $startDate = $event->date();
                $startDate->setHour(19)->setMinutes(0)->setSeconds(0);
                $endDate = $startDate->copy()->setHour(22);

                $performers = [];

                foreach ($eventData['speakers']->value() as $speaker) {
                    $performers[] = Schema::person()
                        ->name($speaker['name'])
                        ->url("https://twitter.com/{$speaker['twitter']}")
                        ->description($speaker['bio']);
                }

                /** @var Entry $event */
                $socialEvent = Schema::socialEvent()
                    ->name($meetup->title)
                    ->description($event->intro)
                    ->performers($performers)
                    ->startDate($startDate)
                    ->endDate($endDate)
                    ->url(meetupUrl($event))
                    ->image(Schema::imageObject()->url($meetupData['logo']->value()->url()))
                    ->location(
                        Schema::place()
                            ->name($eventData['venue'] ? $eventData['venue']->value()->title : '')
                            ->image($eventData['venue'] ? Schema::imageObject()->url(optional($eventData['venue']->value()->toAugmentedArray()['logo']->value())->url()) : '')
                            ->address(
                                Schema::postalAddress()
                                    ->addressCountry('Belgium')
                                    ->addressLocality(str_replace('Full Stack ', '', $eventData['group']->value()->title))
                            )
                    )
                    ->doorTime($startDate)
                    ->isAccessibleForFree(true)
                    ->organizer([
                        Schema::person()->name('Dries Vints')->url('https://driesvints.com'),
                        Schema::person()->name('Rias Van der Veken')->url('https://rias.be'),
                    ]);

                if ($event->sponsor) {
                    $sponsor = \Statamic\Facades\Entry::find($event->sponsor);
                    /** @var \Statamic\Assets\Asset $logo */
                    $logo = $sponsor->toAugmentedArray()['logo']->value();
                    $socialEvent->sponsor(Schema::organization()
                        ->name($sponsor->title)
                        ->image(Schema::imageObject()->url($logo ? $logo->absoluteUrl() : '')));
                }

                return $socialEvent->toScript();
            });
        })->join('');
    }
}
