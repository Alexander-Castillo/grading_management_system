<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('activities', function (Blueprint $table) {
        $table->unsignedBigInteger('teacher_id')->nullable()->after('id'); // O la posición que desees
        $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade'); 
    });
}

public function down()
{
    Schema::table('activities', function (Blueprint $table) {
        $table->dropForeign(['teacher_id']); // Si es que añadiste la clave foránea
        $table->dropColumn('teacher_id');
    });
}

};
