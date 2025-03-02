<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contest_id'); // references contests.id
            $table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade');
            $table->unsignedBigInteger('participant_id'); // references participants.id
            $table->foreign('participant_id')->references('id')->on('participants')->onDelete('cascade');
            $table->string("username");
            $table->timestamp('drawn_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winners');
    }
};
