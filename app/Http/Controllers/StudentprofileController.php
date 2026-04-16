<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\College;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $user = Auth::user();
        // $student = $user->getAuthIdentifier('students')->with(['image', 'city', 'college'])->first();
        $cities = City::all();
        $user = User::all();
        $students = $user->student()->with(['image', 'city', 'college', 'specialization'])->first();
        $colleges = College::all();
        $specializations = Specialization::where('is_active', 1)->get();

        return view('front.student.profile', compact('user', 'students', 'city', 'college', 'specializations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = Auth::user();
        $students = auth()->$user->student()->with(['image', 'city', 'college', 'specialization'])->first();

        return view('front.student.profile', compact('user', 'students', 'city', 'college', 'specializations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = Auth::user();
        $students = $user->student;

        $validator = Validator($request->all(), [
            'name' => 'sometimes|required|string|min:3|max:50',
            'usrer_id' => 'required|exists:usrer,id',
            'address' => 'nullable|string|max:45',
            'phone' => 'required|string|max:20',
            'birth_date' => 'nullable|date',
            'cities_id' => 'nullable|exists:cities,id',
            'level' => 'nullable|string|max:45',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        if (! $validator->fails()) {
            $students = Student::with('user')->findOrFail($id);

            $students->name = $request->get('name');
            $students->phone = $request->get('phone');
            $students->address = $request->get('address');
            $students->birth_date = $request->get('birth_date');
            $students->level = $request->get('level');
            $students->cities->id = $request->get('cities->id');

            $students->user_id = $request->get('user_id');
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('companies', 'public');

                if ($students->image) {
                    if (Storage::disk('public')->exists($students->image->path)) {
                        Storage::disk('public')->delete($students->image->path);
                    }

                    $students->image->delete();
                }

                $students->image()->create([
                    'path' => $path,
                    'type' => 'profile',
                ]);
            }

            $isUpdate = $students->save();

            return redirect()->back()->with('success', 'تم تحديث الملف الشخصي بنجاح');
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
    }
}
