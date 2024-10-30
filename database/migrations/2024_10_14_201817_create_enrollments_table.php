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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->unique()->cascadeOnDelete();
            $table->foreignId('career_id')->constrained('careers','id')->cascadeOnDelete();
            $table->foreignId('speciality_id')->references('id')->on('specialities')->cascadeOnDelete();
            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->foreignId('career_id')->constrained('careers');
            $table->foreignId('specialities_id')->references('id')->on('specialities');
            $table->foreignId('section_id')->constrained('sections');
            $table->timestamps();
            // asegurando que un estudiante pueda tener solo una inscripcion
            $table->unique(['student_id', 'career_id', 'specialities_id'], 'unique_enrollment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
