<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\StudentHour;
use App\Models\WeeklyReport;
use Auth;

class InternshipController extends Controller
{
    // 1. عرض صفحة التدريب للطالب (Internship Details)
    public function index()
    {
        // جلب تدريب الطالب الحالي (يفترض أن الطالب لديه تدريب واحد نشط)
        $internship = Internship::where('students_id', Auth::user()->student->id)
                                ->where('status', 'ongoing')
                                ->first();
        return view('student.internship_details', compact('internship'));
    }

    // 2. تخزين الساعات (طلب اعتماد ساعات)
    public function storeHours(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'hours' => 'required|integer|min:1|max:12',
            'description' => 'required|string',
            'internship_id' => 'required|exists:internships,id'
        ]);

        StudentHour::create([
            'date' => $request->date,
            'Number_of_hours' => $request->hours,
            'Job_description' => $request->description,
            'status' => 'pending',
            'internships_id' => $request->internship_id
        ]);

        return back()->with('success', 'تم إرسال ساعات العمل للاعتماد.');
    }
}