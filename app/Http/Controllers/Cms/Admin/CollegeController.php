<?php

namespace App\Http\Controllers\Cms\Admin;

use App\Http\Controllers\Controller;
use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colleges = College::orderBy('id', 'desc')->paginate(10);
        return view('cms.admin.colleges.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.admin.colleges.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:150|unique:colleges,name',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }

        $college = new College();
        $college->name = $request->get('name');
        $isSaved = $college->save();

        return response()->json([
            'icon' => $isSaved ? 'success' : 'error',
            'title' => $isSaved ? 'Created successfully' : 'Create failed',
        ], $isSaved ? 200 : 400);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $college = College::findOrFail($id);
        return response()->view('cms.admin.colleges.show', compact('college'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $college = College::findOrFail($id);
        return response()->view('cms.admin.colleges.edit', compact('college'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|min:3|max:150|unique:colleges,name,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }

        $college = College::findOrFail($id);
        $college->name = $request->get('name');
        $isUpdated = $college->save();

        return response()->json([
            'icon' => $isUpdated ? 'success' : 'error',
            'title' => $isUpdated ? 'Updated successfully' : 'Update failed',
        ], $isUpdated ? 200 : 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $isDeleted = College::destroy($id);

        return response()->json([
            'icon' => $isDeleted ? 'success' : 'error',
            'title' => $isDeleted ? 'Deleted successfully' : 'Delete failed',
        ], $isDeleted ? 200 : 400);
    }
}
