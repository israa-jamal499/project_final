<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Company;
use App\Models\Internship;
use App\Models\Student;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $internships = Internship::orderBy('id')->paginate(10);

        return response()->view('cms.admin.internships.index', compact('internships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $students = Student::all();
        $colleges = College::all();
        $companies = Company::all();
        $supervisors = Supervisor::all();

        return response()->view('cms.admin.internships.create', compact('students', 'colleges', 'companies', 'supervisors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $student_id)
    {
        //
        $validator = Validator($request->all(), [
            'student_id' => 'required|exists:students,id',
            'college_id' => 'required|exists:colleges,id',
            'company_id' => 'required|exists:companies,id',
            'supervisor_id' => 'required|exists:supervisor,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'nullable|string',
            'notes' => 'nullable|text',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }

        $internships = new Internship;
        $internships->student_id = $request->get('student_id');
        $internships->college_id = $request->get('college_id');
        $internships->company_id = $request->get('company_id');
        $internships->supervisor_id = $request->get('supervisor_id');
        $internships->start_date = $request->get('start_date');
        $internships->end_date = $request->get('end_date');
        $internships->status = $request->get('status');
        $internships->notes = $request->get('notes');
        $internships->save();

        return response()->json([
            'icon' => 'success',
            'title' => 'Created city successfully',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $student_id)
    {
        //
        $students = Student::all();
        $colleges = College::all();
        $companies = Company::all();
        $supervisors = Supervisor::all();
        $internships = Internship::findOrFail($id);

        return response()->view('cms.admin.internships.edit', compact('internships', 'students', 'colleges', 'companies', 'supervisors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, $student_id)
    {
        //
        $validator = Validator($request->all(), [
            'student_id' => 'required|exists:students,id',
            'college_id' => 'required|exists:colleges,id',
            'company_id' => 'required|exists:companies,id',
            'supervisor_id' => 'required|exists:supervisor,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'nullable|string',
            'notes' => 'nullable|text',
        ]);
        if (! $validator->fails()) {
            $internships = Internship::findOrFail($id);
            $internships->student_id = $request->get('student_id');
            $internships->college_id = $request->get('college_id');
            $internships->company_id = $request->get('company_id');
            $internships->supervisor_id = $request->get('supervisor_id');
            $internships->start_date = $request->get('start_date');
            $internships->end_date = $request->get('end_date');
            $internships->status = $request->get('status');
            $internships->notes = $request->get('notes');
            $isUpdate = $internships->save();

            return ['redirect' => route('cities.index')];
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $isDeleted = Internship::destroy($id);

        return response()->json([
            'icon' => $isDeleted ? 'success' : 'error',
            'title' => $isDeleted ? 'Deleted successfully' : 'Delete failed',
        ], $isDeleted ? 200 : 400);
    }
}
