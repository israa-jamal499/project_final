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
        Schema::create('opportunities', function (Blueprint $table) {

            $table->id();
            $table->text('description');
            $table->enum('type', ['online', 'offline', 'mixed'])->default('online');
            $table->integer('required_hours');
            $table->integer('seats');
            $table->integer('filled_seats');
            $table->date('deadline');
            $table->enum('status', ['opened', 'closed', 'waited'])->default('closed');
            $table->text('requirements')->nullable();
            $table->text('benefits')->nullable();
            $table->string('title');
            $table->timestamps();
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->nullable()->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
