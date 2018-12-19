<?php

namespace Tests;

use App\Services\Meetup\MeetupApi;
use App\Services\Twitter\Twitter;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\Concerns\InteractsWithContainer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Mocks\MeetupApi as MeetupApiMock;
use Tests\Mocks\Twitter as TwitterMock;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication,
        RefreshDatabase,
        InteractsWithContainer;

    public function setUp()
    {
        parent::setUp();
    }

    protected function setNow(string $date)
    {
        $newNow = Carbon::createFromFormat('Y-m-d H:i:s', $date);

        Carbon::setTestNow($newNow);
    }

    protected function fakeTwitter(): TwitterMock
    {
        $this->swap(Twitter::class, new TwitterMock());

        return app(Twitter::class);
    }

    protected function fakeMeetupApi(): MeetupApiMock
    {


        $this->swap(MeetupApi::class, new MeetupApiMock());

        return app(MeetupApi::class);
    }
}
