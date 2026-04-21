<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    //
    protected $fillable = [
        'start_date',
        'end_date',
        'status',
        'required_hours',
        'completed_hours',
        'total_hours',
        'notes',
        'tasks',
        'students_id',
        'companies_id',
        'supervisors_id',
        'opportunities_id',
        'applications_id',
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
        return $this->belongsTo(User::class);
    }

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
