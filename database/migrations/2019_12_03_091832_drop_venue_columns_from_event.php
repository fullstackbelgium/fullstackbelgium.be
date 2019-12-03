<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropVenueColumnsFromEvent extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['venue_name', 'venue_logo']);
        });
    }
}
