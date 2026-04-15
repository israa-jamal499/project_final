<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $company = $user->company()->with(['image', 'city', 'supervisors'])->first();
        $cities = City::all();

        return view('company.profile.index', compact('user', 'company', 'cities'));
    }

    public function update(Request $r)
    {
        $user = Auth::user();
        $company = $user->company;

        $r->validate([
            'name' => 'required|string|max:45',
            'website' => 'nullable|url',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:45',
            'field_name' => 'nullable|string|max:45',
            'password' => 'nullable|min:8|confirmed',
        ]);

        if ($company) {
            $company->update([
                'name' => $r->name,
                'website' => $r->website,
                'description' => $r->description,
                'address' => $r->address,
                'field_name' => $r->field_name,
            ]);
        }

        if ($r->filled('password')) {
            $user->update([
                'password' => Hash::make($r->password),
            ]);
        }

        return back()->with('success', 'تم تحديث البيانات بنجاح');
    }
}
