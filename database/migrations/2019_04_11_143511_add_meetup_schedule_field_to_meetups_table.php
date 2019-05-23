<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMeetupScheduleFieldToMeetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meetups', function (Blueprint $table) {
            $table->string('schedule')->after('name')->nullable();
        });
    }
}
