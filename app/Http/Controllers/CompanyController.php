<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
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
        $cities = City::all();
        $users = User::all();

        return view('cms.admin.company.create', compact('users', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'sometimes|required|string|min:3|max:50',
            'phone' => 'required|string|min:10|max:20',
            'address' => 'required|string',
            'website' => 'required|string',
            'description' => 'required|string',
            'field' => 'required|string',
            'user->id' => 'required',
            'city_id' => 'required',
        ]);

        if ($validator->fails()) {
            $companies = new Company;
            $companies->name = $request->get('name');
            $companies->phone = $request->get('phone');
            $companies->address = $request->get('address');
            $companies->website = $request->get('website');
            $companies->description = $request->get('description');
            $companies->field = $request->get('field');
            $companies->user->id = $request->get('user->id');
            $companies->city_id = $request->get('city_id');
            $isSaved = $companies->save();

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
    public function edit($id)
    {
        //
        $company = Company::findOrFail($id);

        return view('cms.company.profile', compact('company'));
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
            'description' => 'nullable|string|max:1000',
            'field' => 'required|string|min:3|max:50',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if (! $validator->fails()) {
            $company = Company::with('user')->findOrFail($id);

            $company->name = $request->get('name');
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

    public function profile()
    {
        $user = Auth::user();

        $company = Company::with(['image', 'city', 'supervisors'])
            ->where('user_id', $user->id)
            ->firstOrFail();

        $cities = City::all();

        return view('cms.company.profile', compact('company', 'cities', 'user'));
    }

    public function Editprofile(Request $request, string $id)
    {
        $validator = Validator($request->all(), [
            'name' => 'sometimes|required|string|min:3|max:50',
            'usrer_id' => 'required|exists:usrer,id',
            'phone' => 'nullable|string|min:7|max:20',
            'address' => 'nullable|string|min:3|max:255',
            'website' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'field' => 'required|string|min:3|max:50',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if (! $validator->fails()) {
            $company = Company::with('user')->findOrFail($id);

            $company->name = $request->get('name');
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
}
