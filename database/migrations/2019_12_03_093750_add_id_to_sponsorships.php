<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdToSponsorships extends Migration
{
    public function up()
    {
        if (env('APP_ENV') !== 'testing') {
            Schema::table('sponsorships', function (Blueprint $table) {
                $table->bigIncrements('id')->first();
            });
        }
    }
}
