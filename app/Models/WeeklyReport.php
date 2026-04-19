<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyReport extends Model
{
    use HasFactory;

    // تحديد اسم الجدول
    protected $table = 'weekly_reports';

    // الحقول المسموح بتعبئتها بناءً على الـ ERD المرفق
    protected $fillable = [
        'week_number',          // رقم الأسبوع 
        'supervisor_feedback',  // تعليقات المشرف [cite: 122]
        'status',               // حالة التقرير (معلق، مقبول، مرفوض) [cite: 123]
        'submitted_at',         // تاريخ التقديم [cite: 124]
        'hours_worked',         // عدد الساعات المنجزة في هذا الأسبوع [cite: 149]
        'learnings',            // ما تم تعلمه [cite: 151]
        'challenges',           // التحديات واختصارها [cite: 153]
        'tasks_planned',        // المهام المخطط لها [cite: 154]
        'tasks_completed',      // المهام المكتملة [cite: 155]
        'week_start',           // تاريخ بداية الأسبوع [cite: 156]
        'week_end',             // تاريخ نهاية الأسبوع [cite: 157]
        'file_path',            // مسار ملف الـ PDF المرفوع 
        'internships_id',       // مفتاح الربط مع جدول التدريب [cite: 159]
    ];

    /**
     * العلاقة مع جدول التدريب (Internship)
     * كل تقرير أسبوعي ينتمي لتدريب واحد محدد
     */
    public function internship()
    {
        return $this->belongsTo(Internship::class, 'internships_id');
    }
}