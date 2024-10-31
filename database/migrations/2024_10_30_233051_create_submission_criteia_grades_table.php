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
        Schema::create('submission_criteia_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')->constrained('submissions','id')->cascadeOnDelete();
            $table->foreignId('criteria_id')->constrained('criteria','id')->cascadeOnDelete();
            $table->double('grade',3,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submission_criteia_grades');
    }
};
