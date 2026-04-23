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
        $table->date('date');
        $table->integer('Number_of_hours');
        $table->text('Job_description');
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->foreignId('internship_id')->constrained('internships')->onDelete('cascade');
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
