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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function internships()
    {
        return $this->hasMany(Internships::class);
    }
}
