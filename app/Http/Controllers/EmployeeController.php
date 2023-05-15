<?php

namespace App\Http\Controllers;

use App\Models\MisCompany; // Added by sarah.izyan
use App\Models\MisDepartment; // Added by sarah.izyan
use App\Models\MisDepartmentUnit; // Added by sarah.izyan
use App\Models\MisDesignation; // Added by sarah.izyan
use App\Models\MisDivision; // Added by sarah.izyan
use App\Models\CdeEmployee;
use App\Models\MisGrade;
use App\Models\MisTitle; // Added by sarah.izyan
use App\Models\User;
use App\Models\MisLocation; // Added by sarah.izyan
use App\Models\MisLine;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = CdeEmployee::leftJoin('mis_titles', 'cde_employees.title_id', '=', 'mis_titles.title_id')
                            ->leftJoin('mis_companies', 'cde_employees.company_id', '=', 'mis_companies.company_id')
                            ->leftJoin('mis_designations', 'cde_employees.designation_id', '=', 'mis_designations.designation_id')
                            ->leftJoin('mis_departments', 'cde_employees.dept_id', '=', 'mis_departments.dept_id')
                            ->leftJoin('mis_department_units', 'cde_employees.dept_unit_id', '=', 'mis_department_units.dept_unit_id')
                            ->leftJoin('mis_divisions', 'cde_employees.division_id', '=', 'mis_divisions.division_id')
                            ->leftJoin('mis_locations', 'cde_employees.location_id', '=', 'mis_locations.location_id')
                            ->leftJoin('mis_grades', 'cde_employees.new_grade_id', '=', 'mis_grades.grade_id')
                            // ->leftjoin('mis_lines', 'employees.line_id', '=', 'mis_lines.line_id')
                            ->where('emp_stat', 'Y')
                            ->get();

        $employeesCount = CdeEmployee::get();
        $titles = MisTitle::where('is_active', 'Y')->get();
        $companies = MisCompany::where('is_active', 'Y')->get();
        $designations = MisDesignation::where('is_active', 'Y')->get();
        $departments = MisDepartment::where('is_active', 'Y')->get();
        $dept_units = MisDepartmentUnit::where('is_active', 'Y')->get();
        $divisions = MisDivision::where('is_active', 'Y')->get();
        $locations = MisLocation::where('is_active', 'Y')->get();
        $grades = MisGrade::where('is_active', 'Y')->get();
        $lines = MisLine::where('is_active', 'Y')->get();

        return view('employee.index', compact(
            'employees',
            'employeesCount',
            'titles', 
            'companies', 
            'designations', 
            'departments',
            'dept_units',
            'divisions',
            'locations',
            'grades'
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
        CdeEmployee::create([
            'emp_id'=>$request->emp_id,
            'emp_no'=>$request->abbr.$request->emp_id,
            'title_id'=>$request->title_id,
            'emp_name'=>$request->emp_name,
            'ad_id'=>$request->ad_id,
            'emp_gender'=>$request->emp_gender,
            'date_joined'=>$request->date_joined,
            'company_id'=>$request->company_id,
            'designation_id'=>$request->designation_id,
            'location_id'=>$request->location_id,
            'contract_ended'=>$request->contract_ended,
            'division_id'=>$request->division_id,
            'dept_id'=>$request->dept_id,
            'dept_unit_id'=>$request->dept_unit_id,
            'new_grade_id'=>$request->new_grade_id,
            'prev_grade_id'=>$request->new_grade_id,
            'usr_create'=>$request->usr_create,
            'emp_stat'=>$request->emp_stat,
        ]);

        return redirect()->back()->with('message','Employee has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CdeEmployee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(CdeEmployee $employee, $emp_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CdeEmployee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(CdeEmployee $employee, $emp_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CdeEmployee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CdeEmployee $employee, $emp_id)
    {
        CdeEmployee::where('emp_id', $emp_id)
                ->update([
                    'title_id'=>$request->title_id,
                    'emp_name'=>$request->emp_name,
                    'ad_id'=>$request->ad_id,
                    'emp_gender'=>$request->emp_gender,
                    'date_joined'=>$request->date_joined,
                    'company_id'=>$request->company_id,
                    'designation_id'=>$request->designation_id,
                    'location_id'=>$request->location_id,
                    'contract_ended'=>$request->contract_ended,
                    'division_id'=>$request->division_id,
                    'dept_id'=>$request->dept_id,
                    'dept_unit_id'=>$request->dept_unit_id,
                    'new_grade_id'=>$request->new_grade_id,
                    'emp_stat'=>$request->emp_stat,
                    'usr_update'=>$request->usr_update,
                ]);
        
        return redirect()->back()->with('message', 'Employee has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CdeEmployee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(CdeEmployee $employee)
    {
        //
    }
}
