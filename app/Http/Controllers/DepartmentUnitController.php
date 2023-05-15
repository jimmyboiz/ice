<?php

namespace App\Http\Controllers;

use App\Models\MisDepartmentUnit;
use Illuminate\Http\Request;

class DepartmentUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dept_units = MisDepartmentUnit::get();

        return view('master-list.deptUnit.index', compact('dept_units'));
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

        MisDepartmentUnit::create($data);

        return redirect()->back()->with('message','Department unit has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MisDepartmentUnit  $departmentUnit
     * @return \Illuminate\Http\Response
     */
    public function show(MisDepartmentUnit $departmentUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MisDepartmentUnit  $departmentUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(MisDepartmentUnit $departmentUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MisDepartmentUnit  $departmentUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MisDepartmentUnit $departmentUnit, $dept_unit_id)
    {
        MisDepartmentUnit::where('dept_unit_id', $dept_unit_id)
                ->update([
                    'dept_unit_name'=>$request->dept_unit_name,
                    'usr_update'=>$request->usr_update,
                    'is_active'=>$request->is_active
                ]);
        
        return redirect()->back()->with('message', 'Department unit has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MisDepartmentUnit  $departmentUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(MisDepartmentUnit $departmentUnit)
    {
        //
    }
}
