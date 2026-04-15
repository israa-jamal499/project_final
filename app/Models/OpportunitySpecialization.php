<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunitySpecialization extends Model
{
    /** @use HasFactory<\Database\Factories\OpportunitySpecializationFactory> */
    use HasFactory;
     protected $fillable = [
        'specialization_id',
        'opportunity_id',
    ];
}
