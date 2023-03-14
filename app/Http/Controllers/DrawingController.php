<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Drawing;
use App\Models\Project;
use App\Models\SubGroup;
use Illuminate\Http\Request;

class DrawingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drawings = Drawing::get();
        return view('project-management.drawing.index', compact('drawings'));
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
            'drawing_name',
            'drawing_desc',
            'keyword'
        ]);

        $data = $request->all();

        Drawing::create($data);

        return redirect()->route('pmd.drawing')->with('message','Drawing has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function show(Drawing $drawing, $drawing_id)
    {
        $drawings = Drawing::where('drawing_id', $drawing_id)->first();
        $contents = Content::where('drawing_id', $drawing_id)->get();
        $subcontents = Content::get();
        $subgroups = SubGroup::where('drawing_id', $drawing_id)->get();
        $projects = Project::get();

        return view('project-management.drawing.view', compact(
            'drawings',
            'contents',
            'subcontents',
            'subgroups',
            'projects'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function edit(Drawing $drawing, $drawing_id)
    {
        $drawings = Drawing::where('drawing_id', '=', $drawing_id)->get();

        return view('project-management.drawing.edit', compact(
            'drawings'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drawing $drawing, $drawing_id)
    {
        $request->validate([
            'drawing_name' => 'required',
            'drawing_desc' => 'required',
            'keyword' => 'required',
            'is_active' => 'required',
            'usr_update' => 'required'
        ]);

        Drawing::where('drawing_id', $drawing_id)
            ->update([
                'drawing_name'=>$request->drawing_name,
                'drawing_desc'=>$request->drawing_desc,
                'keyword'=>$request->keyword,
                'is_active'=>$request->is_active,
                'usr_update'=>$request->usr_update
            ]);

        return redirect()->back()->with('message', 'Drawing has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drawing $drawing)
    {
        //
    }
}
