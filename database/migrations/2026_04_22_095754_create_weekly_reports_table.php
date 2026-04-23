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
    Schema::create('weekly_reports', function (Blueprint $table) {
        $table->id();
        $table->integer('week_number');
        $table->text('learnings')->nullable();
        $table->text('challenges')->nullable();
        $table->integer('hours_worked')->default(0);
        $table->string('file_path')->nullable();
        $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
        $table->text('supervisor_feedback')->nullable();
        $table->timestamp('submitted_at')->useCurrent();
        $table->timestamp('reviewed_at')->nullable();
        $table->foreignId('internship_id')->constrained('internships')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_reports');
    }
};
