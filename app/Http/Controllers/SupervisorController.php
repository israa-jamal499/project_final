<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Http\Request;

class SupervisorController extends Controller
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
            'phone' => 'required|string|min:10|max:20',
            'notes' => 'nullable|string',
            'user->id' => 'required',
            'colleg->id' => 'required',
        ]);

        if ($validator->fails()) {
            $supervisors = new Supervisor;
            $supervisors->name = $request->get('name');
            $supervisors->phone = $request->get('phone');
            $supervisors->notes = $request->get('level');
            $supervisors->user->id = $request->get('user->id');
            $supervisors->colleg->id = $request->get('colleg->id');
            $isSaved = $supervisors->save();

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
        $colleges = College::all();
        $users = User::all();
        $supervisors = Supervisor::findOrFail($id);

        return view('cms.supervisor.profile', compact('supervisors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'sometimes|required|string|min:3|max:50',

            'usrer_id' => 'required|exists:usrer,id',
            'phone' => 'nullable|string|min:7|max:20',
            'notes' => 'nullable|string|max:1000',
            'status' => 'required|in:active,pending,suspended',
        ]);

        if (! $validator->fails()) {
            $supervisor = Supervisor::findOrFail($id);

            $supervisor->name = $request->get('name');
            $supervisor->phone = $request->get('phone');
            $supervisor->notes = $request->get('notes');
            $supervisor->status = $request->get('status');
            $supervisor->user_id = $request->get('user_id');

            $isUpdate = $supervisor->save();

            return redirect()->back()->with('success', 'تم تعديل بيانات المشرف بنجاح');
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
