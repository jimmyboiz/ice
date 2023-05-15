<?php

namespace App\Http\Controllers;

use App\Models\MisDepartment;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = MisDepartment::get();

        return view('master-list.department.index', compact('departments'));
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

        MisDepartment::create($data);

        return redirect()->back()->with('message','Department has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MisDepartment  $department
     * @return \Illuminate\Http\Response
     */
    public function show(MisDepartment $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MisDepartment  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(MisDepartment $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MisDepartment  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MisDepartment $department, $dept_id)
    {
        MisDepartment::where('dept_id', $dept_id)
                ->update([
                    'dept_name'=>$request->dept_name,
                    'dept_code'=>$request->dept_code,
                    'usr_update'=>$request->usr_update,
                    'is_active'=>$request->is_active
                ]);
        
        return redirect()->back()->with('message', 'Department has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MisDepartment  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(MisDepartment $department)
    {
        //
    }
}
