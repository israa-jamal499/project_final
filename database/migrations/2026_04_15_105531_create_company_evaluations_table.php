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
        Schema::create('company_evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('commitment_discipline');
            $table->string('communication_teamwork');
            $table->string('technical_skills');
            $table->text('general_feedback')->nullable();
            $table->boolean('is_final')->default(0);
            $table->string('overall_assessment');

            $table->unsignedBigInteger('internships_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_evaluations');
    }
};
