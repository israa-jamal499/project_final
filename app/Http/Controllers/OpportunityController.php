<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\City;
use Illuminate\Support\Facades\Validator;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $opportunities = Opportunity::orderBy('id', 'desc')->paginate(10);
        //return view('cms.opportunities.index', compact('opportunities'));
         $opportunities = Opportunity::with(['company', 'city'])->latest()->paginate(10);
         return view('cms.opportunities.index', compact('opportunities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //$specializations = \App\Models\Specialization::all();
        //return view('cms.opportunities.create', compact('specializations'));
         $companies = Company::all(); // الشركات
         $cities    = City::all();    // المدن

    return view('cms.opportunities.create', compact('companies', 'cities'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       $validator = Validator::make($request->all(), [
        'title'          => 'required|string|min:3|max:255',
        'description'    => 'required|string',
        'type'           => 'required|in:online,offline,mixed',
        'required_hours' => 'required|integer|min:1',
        'seats'          => 'required|integer|min:1',
        'deadline'       => 'required|date',
        'status'         => 'required|in:opened,closed,waited',
        'requirements'   => 'nullable|string',
        'benefits'       => 'nullable|string',
        'company_id'     => 'nullable|exists:companies,id',
        'city_id'        => 'nullable|exists:cities,id',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'icon'  => 'error',
            'title' => $validator->getMessageBag()->first(),
        ], 400);

    }else{
    $opportunity = new Opportunity();
    $opportunity->title          = $request->title;
    $opportunity->description    = $request->description;
    $opportunity->type           = $request->type;
    $opportunity->required_hours = $request->required_hours;
    $opportunity->seats          = $request->seats;
    $opportunity->filled_seats   = 0;
    $opportunity->deadline       = $request->deadline;
    $opportunity->status         = $request->status;
    $opportunity->requirements   = $request->requirements;
    $opportunity->benefits       = $request->benefits;
    $opportunity->company_id     = $request->company_id;
    $opportunity->city_id        = $request->city_id;
    $isSaved = $opportunity->save();

    return response()->json([
        'icon'     =>'success' ,
        'title'    => 'Created successfully',

    ], 200);

    }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
            $opportunity = Opportunity::with(['company', 'city'])->findOrFail($id);
            return view('cms.opportunities.show', compact('opportunity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
         $opportunity = Opportunity::findOrFail($id);
         $companies   = Company::all();
         $cities      = City::all();
          return view('cms.opportunities.edit',compact('opportunity', 'companies', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */

        //
        public function update(Request $request, $id)
        {
        $validator = Validator::make($request->all(), [
        'title'          => 'required|string|min:3|max:255',
        'description'    => 'required|string',
        'type'           => 'required|in:online,offline,mixed',
        'required_hours' => 'required|integer|min:1',
        'seats'          => 'required|integer|min:1',
        'deadline'       => 'required|date',
        'status'         => 'required|in:opened,closed,waited',
        'requirements'   => 'nullable|string',
        'benefits'       => 'nullable|string',
        'company_id'     => 'nullable|exists:companies,id',
        'city_id'        => 'nullable|exists:cities,id',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'icon'  => 'error',
            'title' => $validator->getMessageBag()->first(),
        ], 400);
    }
    else{
    $opportunity = Opportunity::findOrFail($id);
    $opportunity->title          = $request->title;
    $opportunity->description    = $request->description;
    $opportunity->type           = $request->type;
    $opportunity->required_hours = $request->required_hours;
    $opportunity->seats          = $request->seats;
    $opportunity->deadline       = $request->deadline;
    $opportunity->status         = $request->status;
    $opportunity->requirements   = $request->requirements;
    $opportunity->benefits       = $request->benefits;
    $opportunity->company_id     = $request->company_id;
    $opportunity->city_id        = $request->city_id;
    $isSaved = $opportunity->save();

    return['redirect' => route('opportunities.index'),];


    return response()->json([
        'icon'     =>'success' ,
        'title'    => 'Created successfully',

    ], 200);

    }}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $opportunities = Opportunity::destroy($id);
    }
}
