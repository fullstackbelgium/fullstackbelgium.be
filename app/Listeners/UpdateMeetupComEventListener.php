<?php

namespace App\Listeners;

use App\Actions\UpdateMeetupComEventAction;
use Statamic\Events\Data\EntrySaved;

class UpdateMeetupComEventListener
{
    /** @var \App\Actions\UpdateMeetupComEventAction */
    private $updateMeetupComEventAction;

    public function __construct(UpdateMeetupComEventAction $updateMeetupComEventAction)
    {
        $this->updateMeetupComEventAction = $updateMeetupComEventAction;
    }

    public function handle(EntrySaved $event)
    {
        /** @var \Statamic\Entries\Entry $entry */
        $entry = $event->data;

        if ($entry->collectionHandle() !== 'events') {
            return;
        }

        if (! $entry->meetup_com_id) {
            return;
        }

        $this->updateMeetupComEventAction->execute($entry);
    }
}
