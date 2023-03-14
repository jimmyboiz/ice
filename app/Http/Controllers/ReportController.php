<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Project;
use App\Models\Report;
use App\Models\SubGroup;
use App\Models\SubReport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::get();
        return view('project-management.report.index', compact('reports'));
    }

    public function viewReport($id)
    {
        $viewreports = Report::where('report_id',$id)->first();
        $contents = Content::where('report_id', $id)->get();
        $subcontents = Content::get();
        $subgroups = SubGroup::where('report_id', $id)->get();
        $projects = Project::get();

        return view('project-management.report.view', compact(
            'viewreports', 
            'contents', 
            'subcontents', 
            'subgroups', 
            'projects'));
    }

    public function subReport($id)
    {
        $subreports = SubReport::where('subreport_id', $id)->first();
        $contents = Content::where('subreport_id', $id)->get();

        return view('project-management.report.subreport', compact('subreports', 'contents'));
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
    public function storeReport(Request $request)
    {
        $request->validate([
            'report_name',
            'report_desc',
            'keyword'
        ]);

        $data = $request->all();

        Report::create($data);

        return redirect()->route('pmd.report')->with('message','Report has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report, $report_id)
    {
        $reports = Report::where('report_id', '=', $report_id)->get();

        return view('project-management.report.edit', compact('reports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report, $report_id)
    {
        Report::where('report_id', $request->report_id)
                ->update([
                    'report_name' => $request->report_name,
                    'report_desc' => $request->report_desc,
                    'keyword' => $request->keyword,
                    'is_active' => $request->is_active,
                    'usr_update' => $request->usr_update,
                    'updated_at' => $request->updated_at
                ]);

                return redirect()->route('pmd.editreport', ['report_id' => $request->report_id])->with('message','Report has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
