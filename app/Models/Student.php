<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'name',
        'university_id',
        'level',
        'gender',
        'cv',
        'address',
        'phone',
        'birth_date',
        'user_id',
        'city_id',
        'college_id',
    ];
}
