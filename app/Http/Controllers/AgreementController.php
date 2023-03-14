<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Content;
use App\Models\Project;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agreements = Agreement::first();
        $contents = Content::where('agreement_id',$agreements->agreement_id)->first();
        $projects = Project::get();

        return view('project-management.agreement.index', compact('agreements', 'contents', 'projects'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function show(agreement $agreement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function edit(agreement $agreement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, agreement $agreement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function destroy(agreement $agreement)
    {
        //
    }
}
