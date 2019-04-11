<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateFieldToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->date('date')->first()->nullable();
        });

        \App\Models\Event::withoutEvents(function () {
            $events = \App\Models\Event::all();
            $events->each(function (\App\Models\Event $event) {
                $event->update(['date' => $event->name]);
            });
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
}
