<?php

namespace App\Http\Controllers;

use App\Models\DepartmentUnit;
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
        $dept_units = DepartmentUnit::get();

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

        DepartmentUnit::create($data);

        return redirect()->back()->with('message','Department unit has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DepartmentUnit  $departmentUnit
     * @return \Illuminate\Http\Response
     */
    public function show(DepartmentUnit $departmentUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepartmentUnit  $departmentUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(DepartmentUnit $departmentUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepartmentUnit  $departmentUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepartmentUnit $departmentUnit, $dept_unit_id)
    {
        DepartmentUnit::where('dept_unit_id', $dept_unit_id)
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
     * @param  \App\Models\DepartmentUnit  $departmentUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepartmentUnit $departmentUnit)
    {
        //
    }
}
