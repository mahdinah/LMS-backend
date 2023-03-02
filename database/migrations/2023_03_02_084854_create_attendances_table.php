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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('status');
            $table->unsignedBigInteger('staff_id')->unique();
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');

            $table->unsignedBigInteger('applicant_id')->unique();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            
            $table->unsignedBigInteger('section_id')->unique();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
