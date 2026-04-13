<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable = ['name'];

    public function specializations()
    {
        return $this->hasMany(Specialization::class);
    }
}