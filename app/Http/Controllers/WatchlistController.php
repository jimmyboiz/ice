<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Item;
use App\Models\Project;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Watchlistcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $todaysDate = today()->subDays(60);
        // $contents = Content::whereDate('expiry_date', Carbon::today()->addDays(0)->toDateString())->orderBy('expiry_date')->get();
        // $contents = Content::where('expiry_date',"<", Carbon::now()->addDays(7))->get();
        // $contents = Content::where('expiry_date', '>=', Carbon::now()->addDays(7) )
        //                      ->where('expiry_date', '<=', Carbon::now()->addDays(14))
        //                      ->get();
        $projects = Project::get();
        $todays = Item::leftjoin('projects','items.project_id','=','projects.project_id')->where('expiry_date','=', Carbon::today())->orderBy('expiry_date')->get();
        $sevendays = Item::leftjoin('projects','items.project_id','=','projects.project_id')->whereBetween('expiry_date',[Carbon::today()->addDays(1) , Carbon::today()->addDays(7)])->orderBy('expiry_date')->get();
        $fourteendays = Item::leftjoin('projects','items.project_id','=','projects.project_id')->whereBetween('expiry_date',[Carbon::today()->addDays(8) , Carbon::today()->addDays(14)])->orderBy('expiry_date')->get();
        $thirtydays = Item::leftjoin('projects','items.project_id','=','projects.project_id')->whereBetween('expiry_date',[Carbon::today()->addDays(15) , Carbon::today()->addDays(30)])->orderBy('expiry_date')->get();
        $items = Item::leftjoin('projects','items.project_id','=','projects.project_id')->get();

        return view('project-management.watchlist', compact(
            'items',
            'projects',
            'todays',
            'sevendays',
            'fourteendays',
            'thirtydays'
            ));
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
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function show(Search $search)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function edit(Search $search)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Search $search)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function destroy(Search $search)
    {
        //
    }
}