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
        Schema::create('enrollment_sections', function (Blueprint $table) {
            $table->foreignId('enrollment_id')->constrained('enrollments','id')->cascadeOnDelete();
            $table->foreignId('section_id')->constrained('sections','id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment_sections');
    }
};
