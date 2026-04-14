<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    //
    protected $fillable = [
        'name',
        'phone',
        'notes',
        'status',
        'user_id',
        'status',
    ];
}
