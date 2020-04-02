<?php

use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\HtmlString;
use Statamic\Entries\Entry;
use Statamic\Modifiers\Modify;

function faker(): Generator
{
    return Factory::create();
}

function markdownToHtml(?string $markdown = ''): string
{
    return (new Parsedown())->text($markdown);
}

function svg(string $filename): HtmlString
{
    return new HtmlString(
        file_get_contents(resource_path("svg/{$filename}.svg"))
    );
}

function inline_mix(string $path): HtmlString
{
    return new HtmlString(file_get_contents(
        public_path(mix($path))
    ));
}

function meetupUrl(Entry $event): string
{
    $eventData = $event->toAugmentedArray();
    $group = $eventData['group']->value();

    return "https://meetup.com/{$group->meetup_com_id}/events/{$event->meetup_com_id}";
}

if (! function_exists('modify')) {
    function modify($value) {
        return Modify::value($value);
    }
}

function nextEventForGroup(Entry $group): ?Entry
{
    return \Statamic\Facades\Entry::query()
        ->where('collection', 'events')
        ->where('group', $group->id())
        ->where('date', '>=', now()->startOfDay())
        ->first();
}
