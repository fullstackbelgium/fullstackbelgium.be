<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
