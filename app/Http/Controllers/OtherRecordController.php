<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\OtherRecord;
use App\Models\Project;
use Illuminate\Http\Request;

class OtherRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = OtherRecord::get();

        return view('project-management.other.index', compact('records'));
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

        OtherRecord::create($data);

        return redirect()->route('pmd.other')->with('message','Certificate has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OtherRecord  $otherRecord
     * @return \Illuminate\Http\Response
     */
    public function show(OtherRecord $otherRecord, $otherRec_id)
    {
        $records = OtherRecord::where('otherRec_id', $otherRec_id)->first();
        $contents = Content::where('otherRec_id', $otherRec_id)->get();
        $projects = Project::get();

        return view('project-management.other.view', compact(
            'records',
            'contents',
            'projects'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OtherRecord  $otherRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(OtherRecord $otherRecord, $otherRec_id)
    {
        $records = OtherRecord::where('otherRec_id', '=', $otherRec_id)->get();

        return view('project-management.other.edit', compact('records'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OtherRecord  $otherRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OtherRecord $otherRecord, $otherRec_id)
    {
        OtherRecord::where('otherRec_id', $otherRec_id)
            ->update([
                'otherRec_name'=>$request->otherRec_name,
                'otherRec_desc'=>$request->otherRec_desc,
                'keyword'=>$request->keyword,
                'is_active'=>$request->is_active,
                'usr_update'=>$request->usr_update
            ]);

        return redirect()->back()->with('message', 'Drawing has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OtherRecord  $otherRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtherRecord $otherRecord)
    {
        //
    }
}
