<?php

namespace App\Services\Meetup;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class MeetupServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(MeetupApi::class, function () {
            $client = new Client([
                'base_uri' => 'https://api.meetup.com/',
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            return new MeetupApi($client);
        });
    }
}
