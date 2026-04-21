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
       Schema::create('student_hours', function (Blueprint $table) {
    $table->id();
    $table->date('date'); // [cite: 173]
    $table->integer('Number_of_hours'); // [cite: 174]
    $table->text('Job_description'); // [cite: 175]
    $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // [cite: 176]
    $table->foreignId('internships_id')->constrained('internships'); // [cite: 177]
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_hours');
    }
};
