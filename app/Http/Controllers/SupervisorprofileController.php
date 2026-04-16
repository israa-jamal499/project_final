<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\College;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisorprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $supervisor = $user->getAuthIdentifier('supervisor')->with(['image', 'city', 'college', 'company'])->first();
        $cities = City::all();
        $colleges = College::all();

        return view('cms.supervisor.profile', compact('user', 'supervisor', 'city', 'college'));
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
        //  $supervisor = Supervisor::with(['user.company'])
        //     ->where('user_id', auth()->id())
        //     ->firstOrFail();

        return view('cms.supervisor.profile', compact('user', 'supervisor', 'city', 'college'));
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
            // 'status' => 'required|in:active,pending,suspended',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if (! $validator->fails()) {
            $supervisor = Supervisor::findOrFail($id);

            $supervisor->name = $request->get('name');
            $supervisor->user_id = $request->get('user_id');
            $supervisor->phone = $request->get('phone');
            $supervisor->notes = $request->get('notes');
            //  $supervisor->status = $request->get('status');

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
