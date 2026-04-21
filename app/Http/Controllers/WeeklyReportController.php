<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeeklyReport;
use App\Models\Internship;
use Illuminate\Support\Facades\Auth;

class WeeklyReportController extends Controller
{
    /**
     * عرض صفحة إنشاء التقرير الأسبوعي للطالب
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * حفظ التقرير في قاعدة البيانات
     */
  public function store(Request $request)
{
    $request->validate([
        'week_number' => 'required|integer',
        'hours_worked' => 'required|integer',
        'file_path' => 'required|file|mimes:pdf,doc,docx|max:2048',
        'internships_id' => 'required'
    ]);

    // معالجة رفع الملف
    $path = $request->file('file_path')->store('reports', 'public');

    \App\Models\WeeklyReport::create([
        'week_number' => $request->week_number,
        'hours_worked' => $request->hours_worked,
        'learnings' => $request->learnings,
        'challenges' => $request->challenges,
        'file_path' => $path,
        'status' => 'pending',
        'internships_id' => $request->internships_id,
        'submitted_at' => now()
    ]);

    return back()->with('success', 'تم رفع التقرير بنجاح');
}
    public function index()
    {
       $reports = \App\Models\WeeklyReport::with('internship.student.user')->get();
    return view('reports.index', compact('reports'));
    }
    public function approve(Request $request)
{
    $request->validate([
        'report_id' => 'required|exists:weekly_reports,id',
        'status' => 'required|in:accepted,rejected',
        'supervisor_feedback' => 'nullable|string'
    ]);

    $report = WeeklyReport::findOrFail($request->report_id);
    $report->update([
        'status' => $request->status,
        'supervisor_feedback' => $request->supervisor_feedback,
        'reviewed_at' => now()
    ]);

    return back()->with('success', 'تم تحديث حالة التقرير بنجاح');
}
}