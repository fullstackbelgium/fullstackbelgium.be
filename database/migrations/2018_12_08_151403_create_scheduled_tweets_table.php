<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('scheduled_tweets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('scheduled_to_be_sent_at');
            $table->longText('tweet');
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
        });
    }
};
