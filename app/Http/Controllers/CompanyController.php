<?php

namespace App\Http\Controllers;

use App\Models\MisCompany;
use App\Models\Employee;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = MisCompany::get();

        return view('master-list.company.index', compact('companies'));
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

        MisCompany::create($data);

        return redirect()->back()->with('message','Company has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MisCompany  $company
     * @return \Illuminate\Http\Response
     */
    public function show(MisCompany $company, $company_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MisCompany  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(MisCompany $company, $company_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MisCompany  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MisCompany $company, $company_id)
    {
        MisCompany::where('company_id', $company_id)
                ->update([
                    'company_name'=>$request->company_name,
                    'company_tel_no'=>$request->company_tel_no,
                    'usr_update'=>$request->usr_update,
                    'is_active'=>$request->is_active
                ]);
        
        return redirect()->back()->with('message', 'Company has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MisCompany  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(MisCompany $company)
    {
        //
    }
}
