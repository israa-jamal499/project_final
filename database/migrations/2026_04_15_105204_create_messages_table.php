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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->text('message_body');
            $table->boolean('is_read')->default(0);
            $table->timestamp('read_at')->nullable();
            $table->foreignId('user_sender')->constrained('users')->cascadeOnDelete();
            $table->foreignId('user_receiver')->constrained('users')->cascadeOnDelete();

            // مؤقت لحد ما ننشأ internships
            $table->unsignedBigInteger('internships_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
