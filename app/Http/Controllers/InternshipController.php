<?php
 
namespace App\Http\Controllers;
 
use App\Models\Internship;
use App\Models\Student;
use App\Models\Company;
use App\Models\Supervisor;
use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class InternshipController extends Controller
{
    /**
     * Student: show their own internship page
     */
    public function index()
    {
        $student = Auth::user()->student;
        $internship = null;
 
        if ($student) {
            $internship = Internship::where('student_id', $student->id)
                ->with(['company', 'supervisor', 'opportunity', 'hours', 'weeklyReports'])
                ->first();
        }
 
        return view('front.student.internship', compact('internship'));
    }
 
    /**
     * Admin: list all internships
     */
    public function adminIndex()
    {
        $internships = Internship::with(['student', 'company', 'supervisor'])
            ->orderBy('id')
            ->paginate(10);
 
        return view('cms.admin.internships.index', compact('internships'));
    }
 
    /**
     * Admin: show create form
     */
    public function create()
    {
        $students = Student::all();
        $colleges = College::all();
        $companies = Company::all();
        $supervisors = Supervisor::all();
 
        return view('cms.admin.internships.create', compact('students', 'colleges', 'companies', 'supervisors'));
    }
    /**
 * Admin: show single internship details
 */
public function show(string $id)
{
    $internship = Internship::with([
        'student', 'company', 'supervisor',
        'college', 'hours', 'weeklyReports'
    ])->findOrFail($id);

    return view('cms.admin.internships.show', compact('internship'));
}
 
    /**
     * Admin: store new internship
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'student_id'    => 'required|exists:students,id',
            'company_id'    => 'required|exists:companies,id',
            'supervisor_id' => 'required|exists:supervisors,id',
            'start_date'    => 'required|date',
            'end_date'      => 'nullable|date',
            'required_hours'=> 'required|integer',
            'status'        => 'nullable|string',
            'notes'         => 'nullable|string',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'icon'  => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
 
        Internship::create($request->only([
            'student_id', 'company_id', 'supervisor_id',
            'opportunity_id', 'application_id', 'college_id',
            'start_date', 'end_date', 'status',
            'required_hours', 'notes',
        ]));
        
 
        return response()->json([
            'icon'  => 'success',
            'title' => 'تم إنشاء التدريب بنجاح',
        ], 200);
    }
 
    /**
     * Admin: show edit form
     */
    public function edit(string $id)
    {
        $students    = Student::all();
        $colleges    = College::all();
        $companies   = Company::all();
        $supervisors = Supervisor::all();
        $internship  = Internship::findOrFail($id);
 
        return view('cms.admin.internships.edit', compact(
            'internship', 'students', 'colleges', 'companies', 'supervisors'
        ));
    }
 
    /**
     * Admin: update internship
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator($request->all(), [
            'student_id'    => 'required|exists:students,id',
            'company_id'    => 'required|exists:companies,id',
            'supervisor_id' => 'required|exists:supervisors,id',
            'start_date'    => 'required|date',
            'end_date'      => 'nullable|date',
            'required_hours'=> 'required|integer',
            'status'        => 'nullable|string',
            'notes'         => 'nullable|string',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'icon'  => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
 
        $internship = Internship::findOrFail($id);
        $internship->update($request->only([
            'student_id', 'company_id', 'supervisor_id',
            'opportunity_id', 'application_id', 'college_id',
            'start_date', 'end_date', 'status',
            'required_hours', 'notes',
        ]));
 
        return response()->json([
            'icon'  => 'success',
            'title' => 'تم التحديث بنجاح',
        ], 200);
    }
 
    /**
     * Admin: delete internship
     */
    public function destroy(string $id)
    {
        $isDeleted = Internship::destroy($id);
 
        return response()->json([
            'icon'  => $isDeleted ? 'success' : 'error',
            'title' => $isDeleted ? 'تم الحذف بنجاح' : 'فشل الحذف',
        ], $isDeleted ? 200 : 400);
    }
    /**
 * Admin/Supervisor: approve or reject student hours
 */
public function approveHour(Request $request, string $id)
{
    $hour = \App\Models\StudentHour::findOrFail($id);
    $hour->status = $request->status;
    $hour->save();

    // Update completed_hours on internship
    $internship = $hour->internship;
    $internship->completed_hours = \App\Models\StudentHour::where('internship_id', $internship->id)
        ->where('status', 'approved')
        ->sum('Number_of_hours');
    $internship->save();

    return back()->with('success', 'تم تحديث حالة الساعات بنجاح');
}
/**
 * Create internship automatically when application is accepted
 */
public function createFromApplication($applicationId)
{
    $application = \App\Models\Application::with('opportunity')->findOrFail($applicationId);

    // Check if internship already exists
    $exists = Internship::where('application_id', $applicationId)->exists();
    if ($exists) return;

    Internship::create([
        'student_id'     => $application->student_id,
        'company_id'     => $application->opportunity->company_id,
        'opportunity_id' => $application->opportunity_id,
        'application_id' => $applicationId,
        'required_hours' => $application->opportunity->required_hours,
        'status'         => 'active',
        'start_date'     => now(),
    ]);
}

}