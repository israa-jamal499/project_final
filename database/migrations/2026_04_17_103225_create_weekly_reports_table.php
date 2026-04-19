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
    $table->integer('week_number'); // رقم الأسبوع
    $table->text('learnings')->nullable(); // ماذا تعلم الطالب
    $table->text('challenges')->nullable(); // التحديات
    $table->integer('hours_worked')->default(0); // ساعات العمل في هذا الأسبوع
    $table->string('file_path')->nullable(); // مسار ملف التقرير المرفوع
    
    // حقول خاصة بالمشرف
    $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending'); // حالة التقرير
  $table->text('supervisor_feedback')->nullable(); // ملاحظات المشرف
    
    $table->timestamp('submitted_at')->useCurrent(); // تاريخ الإرسال
    $table->timestamp('reviewed_at')->nullable(); // تاريخ المراجعة من قبل المشرف
    
    // ربط التقرير بالتدريب (Internship)
    $table->foreignId('internships_id')->constrained('internships')->onDelete('cascade');
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
