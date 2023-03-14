<?php

namespace App\Http\Controllers;

use App\Models\SubReport;
use App\Models\Report;
use Illuminate\Http\Request;

class SubReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'subreport_name',
            'keyword',
        ]);

        $data = $request->all();

        SubReport::create($data);

        return redirect()->route('pmd.viewreport', [$request->report_id])->with('message','Report has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubReport  $subReport
     * @return \Illuminate\Http\Response
     */
    public function show(SubReport $subReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubReport  $subReport
     * @return \Illuminate\Http\Response
     */
    public function edit(SubReport $subReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubReport  $subReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubReport $subReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubReport  $subReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubReport $subReport)
    {
        //
    }
}
