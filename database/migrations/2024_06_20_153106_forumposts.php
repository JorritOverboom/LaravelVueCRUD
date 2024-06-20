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
        Schema::create('forumPosts', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('content');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('forumUsers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forumPosts');
    }
};
