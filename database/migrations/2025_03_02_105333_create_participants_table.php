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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contest_id'); // references contests.id
            $table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade');
            $table->unsignedBigInteger('user_id'); // references users.id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string("username");
            $table->timestamp('joined_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
