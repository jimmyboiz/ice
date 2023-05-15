<?php

namespace App\Http\Controllers;

use App\Models\MisGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = MisGrade::get();

        return view('master-list.grade.index', compact('grades'));
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

        MisGrade::create($data);

        return redirect()->back()->with('message','Grade has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MisGrade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(MisGrade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MisGrade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(MisGrade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MisGrade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MisGrade $grade, $grade_id)
    {
        MisGrade::where('grade_id', $grade_id)
                ->update([
                    'grade_desc'=>$request->grade_desc,
                    'usr_update'=>$request->usr_update,
                    'is_active'=>$request->is_active
                ]);
        
        return redirect()->back()->with('message', 'Grade has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MisGrade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(MisGrade $grade)
    {
        //
    }
}
