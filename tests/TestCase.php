<?php

namespace Tests;

use App\Services\Twitter\Twitter;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Mocks\Twitter as TwitterMock;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication,
         RefreshDatabase;

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
        app()->singleton(Twitter::class, function () {
            return new TwitterMock();
        });

        return app(Twitter::class);
    }
}
