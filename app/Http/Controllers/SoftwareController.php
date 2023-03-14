<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Project;
use App\Models\Software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $softwares = Software::get();

        return view('project-management.software.index', compact('softwares'));
    }

    public function view($id)
    {
        $softwares = Software::where('software_id', $id)->first();
        $contents = Content::where('software_id', $id)->get();
        $projects = Project::get();

        return view('project-management.software.view', compact('softwares', 'contents', 'projects'));
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

        Software::create($data);

        return redirect()->route('pmd.software')->with('message','Software has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function show(Software $software)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function edit(Software $software, $software_id)
    {
        $softwares = Software::where('software_id', '=', $software_id)->get();

        return view('project-management.software.edit', compact('softwares'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Software $software, $software_id)
    {
        Software::where('software_id', $software_id)
            ->update([
                'software_name'=>$request->software_name,
                'software_desc'=>$request->software_desc,
                'keyword'=>$request->keyword,
                'is_active'=>$request->is_active,
                'usr_update'=>$request->usr_update
            ]);

        return redirect()->back()->with('message', 'Drawing has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function destroy(Software $software)
    {
        //
    }
}