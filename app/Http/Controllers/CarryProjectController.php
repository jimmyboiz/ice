<?php

namespace App\Http\Controllers;

use App\Models\CarryProject;
use App\Models\Content;
use App\Models\Project;

use Illuminate\Http\Request;

class CarryProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scopes = CarryProject::get();

        return view('project-management.project-scope.index', compact('scopes'));
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

        CarryProject::create($data);

        return redirect()->route('pmd.cops')->with('message','Project scope has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarryProject  $carryProject
     * @return \Illuminate\Http\Response
     */
    public function show(CarryProject $carryProject, $carryProject_id)
    {
        $scopes = CarryProject::where('carryProject_id', $carryProject_id)->first();
        $contents = Content::where('carryProject_id', $carryProject_id)->get();
        $projects = Project::get();

        return view('project-management.project-scope.view', compact(
            'scopes',
            'contents',
            'projects'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarryProject  $carryProject
     * @return \Illuminate\Http\Response
     */
    public function edit(CarryProject $carryProject, $carryProject_id)
    {
        $scopes = CarryProject::where('carryProject_id', '=', $carryProject_id)->get();

        return view('project-management.project-scope.edit', compact('scopes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarryProject  $carryProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarryProject $carryProject, $carryProject_id)
    {
        CarryProject::where('carryProject_id', $carryProject_id)
            ->update([
                'carryProject_name'=>$request->carryProject_name,
                'carryProject_desc'=>$request->carryProject_desc,
                'keyword'=>$request->keyword,
                'is_active'=>$request->is_active,
                'usr_update'=>$request->usr_update
            ]);

        return redirect()->back()->with('message', 'Drawing has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarryProject  $carryProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarryProject $carryProject)
    {
        //
    }
}
