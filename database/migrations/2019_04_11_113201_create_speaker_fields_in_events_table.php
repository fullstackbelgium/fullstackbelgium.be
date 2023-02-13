<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('speaker_1_name')->after('schedule')->nullable();
            $table->string('speaker_1_title')->after('speaker_1_name')->nullable();
            $table->longText('speaker_1_bio')->after('speaker_1_abstract')->nullable();
            $table->string('speaker_1_length')->after('speaker_1_bio')->nullable();

            $table->string('speaker_2_name')->after('speaker_1_length')->nullable();
            $table->string('speaker_2_title')->after('speaker_2_name')->nullable();
            $table->longText('speaker_2_bio')->after('speaker_2_abstract')->nullable();
            $table->string('speaker_2_length')->after('speaker_2_bio')->nullable();
        });
    }
};
