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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_code');
            $table->date('issue_date');
            $table->string('status');
            $table->string('file_path')->nullable();
            $table->text('skills_attended')->nullable();
            $table->text('admin_notes')->nullable();
            $table->dateTime('reviewed_at')->nullable();

            $table->unsignedBigInteger('internships_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
