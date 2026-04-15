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
        Schema::create('supervisor_evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('overall_assessment');
            $table->integer('commitment');
            $table->integer('skills');
            $table->integer('communication');
            $table->text('general_feedback')->nullable();
            $table->boolean('is_final')->default(0);

            $table->unsignedBigInteger('internships_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supervisor_evaluations');
    }
};
