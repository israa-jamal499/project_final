<?php
 
namespace App\Http\Controllers;
 
use App\Models\WeeklyReport;
use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class WeeklyReportController extends Controller
{
    /**
     * Student: show their weekly reports page
     */
    public function index()
    {
        $student = Auth::user()->student;
        $internship = null;
 
        if ($student) {
            $internship = Internship::where('student_id', $student->id)
                ->with('weeklyReports')
                ->first();
        }
 
        return view('front.student.reports', compact('internship'));
    }
 
    /**
     * Student: store a new weekly report
     */
    public function store(Request $request)
    {
        $request->validate([
            'week_number'   => 'required|integer|min:1',
            'hours_worked'  => 'required|integer|min:0',
            'learnings'     => 'required|string',
            'challenges'    => 'required|string',
            'file_path'     => 'required|file|mimes:pdf,doc,docx|max:2048',
            'internships_id'=> 'required|exists:internships,id',
        ]);
 
        // Upload the file
        $path = $request->file('file_path')->store('reports', 'public');
 
        WeeklyReport::create([
            'week_number'   => $request->week_number,
            'hours_worked'  => $request->hours_worked,
            'learnings'     => $request->learnings,
            'challenges'    => $request->challenges,
            'file_path'     => $path,
            'status'        => 'pending',
            'internship_id' => $request->internships_id,
            'submitted_at'  => now(),
        ]);
 
        return back()->with('success', 'تم رفع التقرير بنجاح');
    }
 
    /**
     * Supervisor: show all reports for review
     */
    public function review()
    {
        $supervisor = Auth::user()->supervisor;
 
        $reports = WeeklyReport::whereHas('internship', function ($q) use ($supervisor) {
            $q->where('supervisor_id', $supervisor->id);
        })
        ->with(['internship.student'])
        ->orderBy('submitted_at', 'desc')
        ->get();
 
        return view('cms.supervisor.weekly-reports', compact('reports'));
    }
 
    /**
     * Supervisor: approve or reject a report
     */
    public function approve(Request $request, $id)
    {
        $request->validate([
            'status'             => 'required|in:accepted,rejected',
            'supervisor_feedback'=> 'nullable|string',
        ]);
 
        $report = WeeklyReport::findOrFail($id);
        $report->update([
            'status'             => $request->status,
            'supervisor_feedback'=> $request->supervisor_feedback,
            'reviewed_at'        => now(),
        ]);
 
        return back()->with('success', 'تم تحديث حالة التقرير بنجاح');
    }
}