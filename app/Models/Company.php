<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = [
        'name',
        'phone',
        'address',
        'website',
        'description',
        'logo',
        'field',
        'logo',
        'status',
        'user_id',
        'city_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }

    public function internships()
    {
        return $this->hasMany(Internships::class);
    }
}
