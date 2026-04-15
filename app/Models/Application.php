<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /** @use HasFactory<\Database\Factories\ApplicationFactory> */
    use HasFactory;

 public function student()
    {
        return $this->belongsTo(Student::class);
    }

     public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }

}
