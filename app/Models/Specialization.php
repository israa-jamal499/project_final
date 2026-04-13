<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
     protected $fillable = [
        'college_id',
        'name',
    ];

    public function college()
    {
        return $this->belongsTo(College::class);
    }
}