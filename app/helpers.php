<?php

use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\HtmlString;

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
        file_get_contents(public_path("svg/{$filename}.svg")),
    );
}
