<?php

namespace App\Http\Controllers;

use App\Models\MisDivision;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = MisDivision::get();

        return view('master-list.division.index', compact('divisions'));
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
        if (MisDivision::where('division_name', $request->division_name)->exists()) {

            return redirect()->back()->with('error', 'Division already existed.');

        } else {

            $data = $request->all();

            MisDivision::create($data);

            return redirect()->back()->with('message', 'Division has been created successfully.');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MisDivision  $division
     * @return \Illuminate\Http\Response
     */
    public function show(MisDivision $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MisDivision  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(MisDivision $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MisDivision  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MisDivision $division, $division_id)
    {
        MisDivision::where('division_id', $division_id)
            ->update([
                'division_name' => $request->division_name,
                'usr_update' => $request->usr_update,
                'is_active' => $request->is_active
            ]);

        return redirect()->back()->with('message', 'Division has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MisDivision  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(MisDivision $division)
    {
        //
    }
}