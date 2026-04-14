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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
