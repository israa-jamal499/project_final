<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
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
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
  
   
    $application->update(['status' => 'accepted']);

   
    
    \App\Models\Internship::create([
        'start_date'        => now(),
        'status'            => 'active',
        'required_hours'    => $application->opportunity->required_hours,
        'students_id'       => $application->students_id,
        'companies_id'      => $application->companies_id,
        'opportunities_id'  => $application->opportunities_id,
    ]);

    return back()->with('success', 'تم قبول الطلب وبدء التدريب بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
