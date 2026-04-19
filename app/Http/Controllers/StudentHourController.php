<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentHour;
use App\Models\Internship;
use Auth;

class StudentHourController extends Controller
{
    public function index()
    {
        // جلب بيانات التدريب الخاص بالطالب المسجل دخوله حالياً
        $internship = Internship::where('students_id', Auth::user()->student->id)->first();
        return view('front.student.hours', compact('internship'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'number_of_hours' => 'required|integer|min:1|max:12',
            'job_description' => 'required|string',
            'internship_id' => 'required'
        ]);

        StudentHour::create([
            'date' => $request->date,
            'Number_of_hours' => $request->number_of_hours,
            'Job_description' => $request->job_description,
            'status' => 'pending',
            'internships_id' => $request->internship_id
        ]);

        return back()->with('success', 'تم حفظ الساعات بنجاح');
    }
}