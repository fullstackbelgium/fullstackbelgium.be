<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (env('APP_ENV') !== 'testing') {
            Schema::table('sponsorships', function (Blueprint $table) {
                $table->bigIncrements('id')->first();
            });
        }
    }
};
