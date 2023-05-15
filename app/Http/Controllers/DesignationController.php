<?php

namespace App\Http\Controllers;

use App\Models\MisDesignation;
use App\Models\User;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = MisDesignation::get();

        return view('master-list.designation.index', compact('designations'));
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

        if (MisDesignation::where('designation_name', $request->designation_name)->exists()) {

            return redirect()->back()->with('error', 'Designation name already existed.');

        } else {

            MisDesignation::create($data);
            return redirect()->back()->with('message', 'Designation has been created successfully.');
            
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(MisDesignation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(MisDesignation $designation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MisDesignation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MisDesignation $designation, $designation_id)
    {
        MisDesignation::where('designation_id', $designation_id)
            ->update([
                'designation_name' => $request->designation_name,
                'usr_update' => $request->usr_update,
                'is_active' => $request->is_active
            ]);

        return redirect()->back()->with('message', 'Designation has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MisDesignation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(MisDesignation $designation)
    {
        //
    }
}