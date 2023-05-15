<?php

namespace App\Http\Controllers;

use App\Models\RmsRiskStat;
use Illuminate\Http\Request;

class RmsRiskStatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $risk_stats = RmsRiskStat::get();

        return view('rms.risk-stat.index', compact('risk_stats'));
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

        RmsRiskStat::create($data);

        return redirect()->back()->with('message','Risk Status has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RmsRiskStat  $riskStat
     * @return \Illuminate\Http\Response
     */
    public function show(RmsRiskStat $riskStat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RmsRiskStat  $riskStat
     * @return \Illuminate\Http\Response
     */
    public function edit(RmsRiskStat $riskStat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RmsRiskStat  $riskStat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RmsRiskStat $riskStat, $risk_stat_id)
    {
        RmsRiskStat::where('risk_stat_id', $risk_stat_id)
                ->update([
                    'risk_stat_name'=>$request->risk_stat_name,
                    'risk_stat_desc'=>$request->risk_stat_desc,
                    'usr_update'=>$request->usr_update,
                    'is_active'=>$request->is_active
                ]);
        
        return redirect()->back()->with('message', 'Risk Status has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RmsRiskStat  $riskStat
     * @return \Illuminate\Http\Response
     */
    public function destroy(RmsRiskStat $riskStat)
    {
        //
    }
}
