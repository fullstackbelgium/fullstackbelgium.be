<?php

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('venue_id')->nullable();

            $table->foreign('venue_id')->references('id')->on('venues');
        });

        Event::each(function (Event $event) {
            $venue = Venue::firstOrCreate([
                'name' => $event->venue_name,
                'logo' => $event->venue_logo,
            ]);

            $event->update(['venue_id' => $venue->id]);
        });
    }
};
