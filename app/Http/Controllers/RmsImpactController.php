<?php

namespace App\Http\Controllers;

use App\Models\RmsImpact;
use Illuminate\Http\Request;

class RmsImpactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $impacts = RmsImpact::get();

        return view('rms.impact.index', compact('impacts'));
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

        RmsImpact::create($data);

        return redirect()->back()->with('message', 'Impact has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RmsImpact  $impact
     * @return \Illuminate\Http\Response
     */
    public function show(RmsImpact $impact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RmsImpact  $impact
     * @return \Illuminate\Http\Response
     */
    public function edit(RmsImpact $impact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RmsImpact  $impact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RmsImpact $impact, $impact_id)
    {
        RmsImpact::where('impact_id', $impact_id)
            ->update([
                'impact_name' => $request->impact_name,
                'impact_value' => $request->impact_value,
                'usr_update' => $request->usr_update,
                'is_active' => $request->is_active
            ]);

        return redirect()->back()->with('message', 'Impact has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RmsImpact  $impact
     * @return \Illuminate\Http\Response
     */
    public function destroy(RmsImpact $impact)
    {
        //
    }
}