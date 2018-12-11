<?php

use Faker\Factory;
use Faker\Generator;

function faker(): Generator
{
    return Factory::create();
}

function markdownToHtml(string $markdown): string
{
    return (new Parsedown())->text($markdown);
}
