<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class WeeklyReport extends Model
{
    protected $table = 'weekly_reports';
 
    protected $fillable = [
        'week_number',
        'supervisor_feedback',
        'status',
        'submitted_at',
        'reviewed_at',
        'hours_worked',
        'learnings',
        'challenges',
        'file_path',
        'internship_id',
    ];
 
    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }
}