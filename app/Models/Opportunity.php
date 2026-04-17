<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opportunity extends Model
{
    /** @use HasFactory<\Database\Factories\OpportunityFactory> */
    use HasFactory ,SoftDeletes;
    protected $fillable = [
        'description',
        'type',
        'required_hours',
        'seats',
        'filled_seats',
        'deadline',
        'status',
        'requirements',
        'benefits',
        'title',
        'company_id',
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

     public function specializations()
    {
        return $this->belongsToMany(Specialization::class ,'opportunity_specializations');
    }
     public function applications()
    {
        return $this->hasMany(Application::class);
    }


}
