<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Environmental;
use App\Models\Project;

use Illuminate\Http\Request;

class EnvironmentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $environmentals = Environmental::get();

        return view('project-management.environmental.index', compact('environmentals'));
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
            'environment_name',
            'environment_desc',
            'keyword'
        ]);

        $data = $request->all();

        Environmental::create($data);

        return redirect()->route('pmd.environmental')->with('message','Environmental has been created successfully.');
    }

    public function view($id)
    {
        $contents = Content::where('environment_id', $id)->get();
        $environmentals = Environmental::where('environment_id', $id)->first();
        $projects = Project::get();

        return view('project-management.environmental.view', compact('contents', 'environmentals', 'projects'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Environmental  $environmental
     * @return \Illuminate\Http\Response
     */
    public function show(Environmental $environmental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Environmental  $environmental
     * @return \Illuminate\Http\Response
     */
    public function edit(Environmental $environmental, $id)
    {
        $environmentals = Environmental::where('environment_id', $id)->get();

        return view('project-management.environmental.edit', compact('environmentals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Environmental  $environmental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Environmental $environmental, $id)
    {
        Environmental::where('environment_id', $request->environment_id)
                ->update([
                    'environment_name' => $request->environment_name,
                    'environment_desc' => $request->environment_desc,
                    'keyword' => $request->keyword,
                    'is_active' => $request->is_active,
                    'usr_update' => $request->usr_update,
                    'updated_at' => $request->updated_at
                ]);

                return redirect()->route('pmd.editEnvironmental', ['environment_id' => $id])->with('message','Environmental has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Environmental  $environmental
     * @return \Illuminate\Http\Response
     */
    public function destroy(Environmental $environmental)
    {
        //
    }
}
