<?php

namespace App\Http\Controllers;

use App\Models\RmsCtrlMonitoring;
use Illuminate\Http\Request;

class RmsCtrlMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ctrl_monitors = RmsCtrlMonitoring::get();

        return view('rms.ctrl-monitor.index', compact('ctrl_monitors'));
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

        RmsCtrlMonitoring::create($data);

        return redirect()->back()->with('message', 'Control Monitoring has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RmsCtrlMonitoring  $ctrlMonitoring
     * @return \Illuminate\Http\Response
     */
    public function show(RmsCtrlMonitoring $ctrlMonitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RmsCtrlMonitoring  $ctrlMonitoring
     * @return \Illuminate\Http\Response
     */
    public function edit(RmsCtrlMonitoring $ctrlMonitoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RmsCtrlMonitoring  $ctrlMonitoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RmsCtrlMonitoring $ctrlMonitoring, $ctrl_monitor_id)
    {
        RmsCtrlMonitoring::where('ctrl_monitor_id', $ctrl_monitor_id)
            ->update([
                'ctrl_monitor_name' => $request->ctrl_monitor_name,
                'usr_update' => $request->usr_update,
                'is_active' => $request->is_active
            ]);

        return redirect()->back()->with('message', 'Control Monitoring has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RmsCtrlMonitoring  $ctrlMonitoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(RmsCtrlMonitoring $ctrlMonitoring)
    {
        //
    }
}