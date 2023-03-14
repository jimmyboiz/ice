<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalsystems = System::get();
        $systems = System::where('system_name','not like', 'DB%')->get();
        $databases = System::where('system_name','like', 'DB%')->get();
        return view('system.index', compact('systems', 'databases', 'totalsystems'));
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
            'system_name',
            'system_desc',
            'system_category',
            'system_type',
            'system_hostname',
            'system_software',
            'system_url',
            'system_deploy',
            'system_publish',
            'system_vendor',
            'system_owner',
            'system_admin',
            'system_hardware',
            'system_os',
            'system_user',
            'is_active',
        ]);

        $data = $request->all();

        System::create($data);

        return redirect()->route('system.index')->with('message','System successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function show(System $system)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function edit(System $system)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, System $system, $id)
    {
        $request->validate([
            'system_name' => 'required',
            'system_desc' => 'required',
        ]);

        System::where('system_id', $id)
        ->update([
            'usr_update'=>$request->usr_update,
            'system_name'=>$request->system_name,
            'system_desc'=>$request->system_desc,
            'system_category'=>$request->system_category,
            'system_type'=>$request->system_type,
            'system_hostname'=>$request->system_hostname,
            'system_software'=>$request->system_software,
            'system_url'=>$request->system_url,
            'system_deploy'=>$request->system_deploy,
            'system_publish'=>$request->system_publish,
            'system_vendor'=>$request->system_vendor,
            'system_owner'=>$request->system_owner,
            'system_admin'=>$request->system_admin,
            'system_hardware'=>$request->system_hardware,
            'system_os'=>$request->system_vendor,
            'system_user'=>$request->system_user,
            'is_active'=>$request->is_active,
        ]);

        return redirect()->route('system.index')->with('message','System details has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function destroy(System $system)
    {
        //
    }
}
