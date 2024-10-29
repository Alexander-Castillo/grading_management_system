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
        Schema::create('career_speciality', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_id')->constrained('careers')->cascadeOnDelete();
            $table->foreignId('speciality_id')->constrained('specialities')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_specialty');
    }
};
