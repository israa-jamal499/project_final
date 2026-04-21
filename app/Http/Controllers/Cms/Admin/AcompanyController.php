<?php

namespace App\Http\Controllers\Cms\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $companies = Company::withCount('opportunities')->orderBy('id')->paginate(4);

        return view('cms.admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cities = City::all();

        return response()->view('cms.admin.company.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'sometimes|required|string|min:3|max:50',
            'city_id' => 'required|exists:city,id',
            'phone' => 'nullable|string|min:7|max:20',
            'address' => 'nullable|string|min:3|max:255',
            'website' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'field' => 'required|string|min:3|max:50',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        if ($validator->fails()) {
            $companies = new Company;
            $companies->name = $request->get('name');
            $companies->phone = $request->get('phone');
            $companies->status = $request->get('status');
            $companies->website = $request->get('website');
            $companies->address = $request->get('address');
            $companies->address = $request->get('field');
            $companies->description = $request->get('description');
            $companies->city_id = $request->get('city_id');
            $companies->logo = $request->get('logo');
            $isSaved = $companies->save();
            if ($isSaved) {
                $user = new User;
                $user->email = $request->get('email');
                $user->password = $request->get('password');
                $isSaved = $user->save();
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
        $validator = Validator($request->all(), [
            'name' => 'sometimes|required|string|min:3|max:50',
            'usrer_id' => 'required|exists:usrer,id',
            'phone' => 'nullable|string|min:7|max:20',
            'address' => 'nullable|string|min:3|max:255',
            'website' => 'nullable|string|max:255',
            'field' => 'required|string|min:3|max:50',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if (! $validator->fails()) {
            $company = Company::with('user')->findOrFail($id);

            $company->name = $request->get('name');
            $company->usrer_id = $request->get('usrer_id');
            $company->phone = $request->get('phone');
            $company->address = $request->get('address');
            $company->website = $request->get('website');
            $company->description = $request->get('description');
            $company->field = $request->get('field');

            $company->user_id = $request->get('user_id');
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('companies', 'public');

                if ($company->image) {
                    if (Storage::disk('public')->exists($company->image->path)) {
                        Storage::disk('public')->delete($company->image->path);
                    }

                    $company->image->delete();
                }

                $company->image()->create([
                    'path' => $path,
                    'type' => 'profile',
                ]);
            }

            $isUpdate = $company->save();

            return redirect()->back()->with('success', 'تم تعديل بيانات الشركة بنجاح');
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
$validator = Validator($request->all(), []);
        if (! $validator->fails()) {
            $company = Company::with('user')->findOrFail($id);

            $company->name = $request->get('name');
            $company->usrer_id = $request->get('usrer_id');
            $company->phone = $request->get('phone');
            $company->address = $request->get('address');
            $company->website = $request->get('website');
            $company->description = $request->get('description');
            $company->field = $request->get('field');

            $company->user_id = $request->get('user_id');
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('companies', 'public');

                if ($company->image) {
                    if (Storage::disk('public')->exists($company->image->path)) {
                        Storage::disk('public')->delete($company->image->path);
                    }

                    $company->image->delete();
                }

                $company->image()->create([
                    'path' => $path,
                    'type' => 'profile',
                ]);
            }

           $isUpdate = $company->save();

        if ($isUpdate) {
            return redirect()->back()->with('success', 'تم تعديل بيانات الشركة بنجاح');
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
    
    /**
     * Remove the specified resource from storage.
     */

        }
