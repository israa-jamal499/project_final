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
        Schema::create('internships', function (Blueprint $table) {
    $table->id();
    $table->date('start_date'); 
    $table->date('end_date')->nullable(); 
    $table->enum('status', ['active', 'completed', 'terminated'])->default('active'); // [cite: 129]
    $table->integer('required_hours'); 
    $table->integer('completed_hours')->default(0); 
    $table->foreignId('students_id')->constrained('students'); // [cite: 135]
    $table->foreignId('companies_id')->constrained('companies'); // [cite: 136]
    $table->foreignId('opportunities_id')->constrained('opportunities'); // [cite: 148]
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};
