<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Internship extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'status',
        'required_hours',
        'completed_hours',
        'total_hours',
        'notes',
        'tasks',
        'student_id',
        'company_id',
        'supervisor_id',
        'opportunity_id',
        'application_id',
        'college_id',
    ];
 
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
 
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
 
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }
 
    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
 
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
 
    public function hours()
    {
        return $this->hasMany(StudentHour::class);
    }
 
    public function weeklyReports()
    {
        return $this->hasMany(WeeklyReport::class);
    }
}
 