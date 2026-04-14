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
}
