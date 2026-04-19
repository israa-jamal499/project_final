<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentHour extends Model
{
    protected $fillable = ['date', 'Number_of_hours', 'Job_description', 'status', 'internships_id'];
    public function internship() {
    return $this->belongsTo(Internship::class, 'internships_id');
}
}
