<?php

use App\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateFieldToEventsTable extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->date('date')->first()->nullable();
        });

        Event::withoutEvents(function () {
            $events = Event::all();
            $events->each(function (Event $event) {
                $event->update(['date' => $event->name]);
            });
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
}
