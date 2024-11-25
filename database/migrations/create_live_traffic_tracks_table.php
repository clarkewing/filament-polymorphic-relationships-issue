<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('live_traffic_tracks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('live_traffic_id')->constrained()->cascadeOnDelete();
            $table->string('transcript');
            $table->timestamps();
        });
    }
};