<?php

namespace App\Http\Controllers\Cms\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Image;
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
        $students = Student::orderBy('id')->paginate(4);

        return view('cms.admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $colleges = College::all();

        return response()->view('cms.admin.student.create', compact('colleges'));
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
            $students->colleg->id = $request->get('colleg->id');
            $isSaved = $students->save();
            if ($isSaved) {
                $user = new User;
                $user->email = $request->get('email');
                $user->password = $request->get('password');
                $isSaved = $user->save();
            }
            if ($isSaved) {
                $image = new Image;
                $image->image = $request->get('image');
                $image->actor()->associate($students);
                $isSaved = $image->save();
            }

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

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
