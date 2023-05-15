<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Models\MisDivision;
use App\Models\CdeEmployee;
use App\Models\Item;
use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmdIndex()
    {
        return view('project-management.index');
    }

    public function pmdAbout()
    {
        return view('project-management.about');
    }

    public function pmdDirectory()
    {
        return view('project-management.directory');
    }

    public function rmsCorpIndex()
    {
        return view('rms.corporate.index');
    }

    public function rmsOpIndex()
    {
        $divisions = MisDivision::get();
        return view('rms.corporate.operational.index', compact('divisions'));
    }

    public function createInstruct()
    {
        return view('auth.create-instruction');
    }

    public function index()
    {
        $contractors = DB::connection('sqlsrv2')->table('bcms_contractor')->get();
        $systems = System::get();
        $employees = CdeEmployee::get();
        return view('dashboard', compact('systems', 'employees', 'contractors'));
    }

    public function homepage()
    {
        return view('homepage');
    }

    public function notification()
    {
        $todays = Item::where('expiry_date','=', Carbon::today())->orderBy('expiry_date')->get();

        return view('layouts.notification', compact('todays'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
