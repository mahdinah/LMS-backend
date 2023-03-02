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
        Schema::create('section_subject', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id')->unique();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');


            $table->unsignedBigInteger('subject_id')->unique();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_subject');
    }
};
