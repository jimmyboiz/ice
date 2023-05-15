<?php

namespace App\Http\Controllers;

use App\Models\MisLocation;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = MisLocation::get();

        return view('master-list.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        MisLocation::create($data);

        return redirect()->back()->with('message','Location has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MisLocation  $location
     * @return \Illuminate\Http\Response
     */
    public function show(MisLocation $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MisLocation  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(MisLocation $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MisLocation  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MisLocation $location, $location_id)
    {
        MisLocation::where('location_id', $location_id)
                ->update([
                    'location_name'=>$request->location_name,
                    'location_code'=>$request->location_code,
                    'usr_update'=>$request->usr_update,
                    'is_active'=>$request->is_active
                ]);
        
        return redirect()->back()->with('message', 'Location has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MisLocation  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(MisLocation $location)
    {
        //
    }
}
