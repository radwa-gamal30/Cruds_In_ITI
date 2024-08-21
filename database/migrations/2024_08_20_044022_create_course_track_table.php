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
        Schema::create('course_track', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('trackId');
            $table->foreign('trackId')->references('id')->on('tracks')->onDelete('cascade');
            $table->unsignedBiginteger('courseId');
            $table->foreign('courseId')->references('id')->on('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_track');
    }
};
