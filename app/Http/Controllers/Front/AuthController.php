<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Specialization;

class AuthController extends Controller
{
   public function registerStudent()
{
    $colleges = College::orderBy('name')->get();
    $specializations = Specialization::orderBy('name')->get();

    return view('front.auth.register-student', compact('colleges', 'specializations'));
}
public function getCollegeSpecializations($collegeId)
{
    $specializations = Specialization::where('college_id', $collegeId)
        ->orderBy('name')
        ->get(['id', 'name']);

    return response()->json($specializations);
}
}
