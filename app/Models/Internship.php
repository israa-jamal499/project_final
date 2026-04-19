<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    // تحديد اسم الجدول إذا كان مختلفاً عن جمع اسم الموديل
    protected $table = 'internships'; 

    // الحقول المسموح بتعبئتها بناءً على الـ ERD [cite: 125, 126]
    protected $fillable = [
        'start_date',      // [cite: 127]
        'erid_date',       // (ملاحظة: مكتوبة erid في ERD وقد تقصد end_date) 
        'status',          // [cite: 129]
        'required_hours',  // [cite: 130]
        'completed_hours', // [cite: 131]
        'total_hours',     // [cite: 132]
        'notes',           // [cite: 133]
        'tasks',           // [cite: 134]
        'students_id',     // [cite: 135]
        'companies_id',    // [cite: 136]
        'supervisors_id',  // [cite: 146]
        'opportunities_id',// [cite: 148]
        'applications_id'  // [cite: 150]
    ];

    // --- العلاقات (Relationships) ---

    // العلاقة مع الطالب [cite: 42, 135]
    public function student()
    {
        return $this->belongsTo(Student::class, 'students_id');
    }

    // العلاقة مع الشركة [cite: 17, 136]
    public function company()
    {
        return $this->belongsTo(Company::class, 'companies_id');
    }

    // العلاقة مع المشرف [cite: 62, 146]
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'supervisors_id');
    }

    // العلاقة مع الساعات () [cite: 171, 177]
    public function hours()
    {
        return $this->hasMany(StudentHour::class, 'internships_id');
    }

    // العلاقة مع التقارير الأسبوعية  [cite: 119, 159]
    public function weeklyReports()
    {
        return $this->hasMany(WeeklyReport::class, 'internships_id');
    }

    // العلاقة مع التقييمات () [cite: 82, 90, 91, 99]
    public function companyEvaluations()
    {
        return $this->hasMany(CompanyEvaluation::class, 'internships_id');
    }

    public function supervisorEvaluations()
    {
        return $this->hasMany(SupervisorEvaluation::class, 'internships_id');
    }
}
