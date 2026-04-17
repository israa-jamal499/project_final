<?php

namespace App\Http\Controllers\Cms\Admin;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Image;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Http\Request;

class AsuperviosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $supervios = Supervisor::withCount('student')->orderBy('id')->paginate(4);

        return view('cms.admin.supervisor.index', compact('supervios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $colleges = College::all();

        return view('cms.admin.supervisor.create', compact('colleges'));
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
            'colleg->id' => 'required',
        ]);

        if ($validator->fails()) {
            $supervisors = new Supervisor;
            $supervisors->name = $request->get('name');
            $supervisors->phone = $request->get('phone');
            $supervisors->notes = $request->get('notes');
            $supervisors->status = $request->get('status');
            $supervisors->colleg->id = $request->get('colleg->id');
            $isSaved = $supervisors->save();
            if ($isSaved) {
                $user = new User;
                $user->email = $request->get('email');
                $user->password = $request->get('password');
                $isSaved = $user->save();
            }
            if ($isSaved) {
                $image = new Image;
                $image->image = $request->get('image');
                $image->actor()->associate($supervisors);
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
