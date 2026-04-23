<?php
 
namespace App\Http\Controllers;
 
use App\Models\StudentHour;
use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class StudentHourController extends Controller
{
    /**
     * Show the hours page for the logged-in student
     */
    public function index()
    {
        $student = Auth::user()->student;
        $internship = null;
 
        if ($student) {
            $internship = Internship::where('student_id', $student->id)
                ->with('hours')
                ->first();
        }
 
        return view('front.student.hours', compact('internship'));
    }
 
    /**
     * Store a new hour log
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'           => 'required|date',
            'number_of_hours'=> 'required|integer|min:1|max:12',
            'job_description'=> 'required|string',
            'internship_id'  => 'required|exists:internships,id',
        ]);
 
        StudentHour::create([
            'date'           => $request->date,
            'Number_of_hours'=> $request->number_of_hours,
            'Job_description'=> $request->job_description,
            'status'         => 'pending',
            'internship_id'  => $request->internship_id,
        ]);
 
        // Update completed_hours on the internship
        $internship = Internship::find($request->internship_id);
        if ($internship) {
            $internship->completed_hours = StudentHour::where('internship_id', $internship->id)
                ->where('status', 'approved')
                ->sum('Number_of_hours');
            $internship->save();
        }
 
        return back()->with('success', 'تم حفظ الساعات بنجاح');
    }
 
    /**
     * Delete a pending hour log
     */
    public function destroy(string $id)
    {
        $hour = StudentHour::findOrFail($id);
 
        // Only allow deleting pending hours
        if ($hour->status !== 'pending') {
            return back()->with('error', 'لا يمكن حذف ساعات معتمدة أو مرفوضة');
        }
 
        $hour->delete();
 
        return back()->with('success', 'تم حذف السجل بنجاح');
    }
}