<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $colleges = College::all();
        $users = User::all();

        return view('cms.admin.student.create', compact('users', 'colleges'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'sometimes|required|string|min:3|max:50',
            'university_id' => 'required|string',
            'level' => 'required|string',
            'address' => 'nullable|string',
            'birth_date' => 'required|date',
            'phone' => 'nullable|string|min:10|max:20',
            'user->id' => 'required',
            'colleg->id' => 'required',
        ]);

        if ($validator->fails()) {
            $students = new Student;
            $students->name = $request->get('name');
            $students->university_id = $request->get('university_id');
            $students->level = $request->get('level');
            $students->address = $request->get('address');
            $students->birth_date = $request->get('birth_date');
            $students->phone = $request->get('phone');
            $students->user->id = $request->get('user->id');
            $students->colleg->id = $request->get('colleg->id');
            $isSaved = $students->save();

            return response()->json([
                'icon' => 'success',
                'title' => 'Created successfully ',
            ], 200);
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
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
    public function edit(string $id)
    {
        //
        $student = Student::findOrFail($id);

        return view('front.student.profile', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'sometimes|required|string|min:3|max:50',
            'email' => 'required|email',
            'phone' => 'nullable|string|min:7|max:20',
            'notes' => 'nullable|string|max:1000',
            'status' => 'required|in:active,pending,suspended',
        ]);

        //   } else {
        // return response()->json([
        //   'icon' => 'error',
        //     'title' => $validator->getMessageBag()->first(),
        // ], 400);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
