<?php

namespace App\Http\Controllers;

use App\Models\Company; // Added by sarah.izyan
use App\Models\Department; // Added by sarah.izyan
use App\Models\DepartmentUnit; // Added by sarah.izyan
use App\Models\Designation; // Added by sarah.izyan
use App\Models\Division; // Added by sarah.izyan
use App\Models\Employee;
use App\Models\Grade;
use App\Models\Title; // Added by sarah.izyan
use App\Models\User;
use App\Models\Location; // Added by sarah.izyan
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
        $employees = Employee::leftJoin('titles', 'employees.title_id', '=', 'titles.title_id')
                            ->leftJoin('companies', 'employees.company_id', '=', 'companies.company_id')
                            ->leftJoin('designations', 'employees.designation_id', '=', 'designations.designation_id')
                            ->leftJoin('departments', 'employees.dept_id', '=', 'departments.dept_id')
                            ->leftJoin('department_units', 'employees.dept_unit_id', '=', 'department_units.dept_unit_id')
                            ->leftJoin('divisions', 'employees.division_id', '=', 'divisions.division_id')
                            ->leftJoin('locations', 'employees.location_id', '=', 'locations.location_id')
                            ->leftJoin('grades', 'employees.new_grade_id', '=', 'grades.grade_id')
                            ->get();

        $employeesCount = Employee::get();
        $titles = Title::where('is_active', 'Y')->get();
        $companies = Company::where('is_active', 'Y')->get();
        $designations = Designation::where('is_active', 'Y')->get();
        $departments = Department::where('is_active', 'Y')->get();
        $dept_units = DepartmentUnit::where('is_active', 'Y')->get();
        $divisions = Division::where('is_active', 'Y')->get();
        $locations = Location::where('is_active', 'Y')->get();
        $grades = Grade::where('is_active', 'Y')->get();

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
        Employee::create([
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
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee, $emp_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee, $emp_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee, $emp_id)
    {
        Employee::where('emp_id', $emp_id)
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
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
