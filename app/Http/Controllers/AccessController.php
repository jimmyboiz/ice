<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Employee;
use App\Models\Role;
use App\Models\System;
use App\Models\Title;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $systems = System::where('system_name','not like','DB%')->get();
        $employees = Employee::leftJoin('titles', 'employees.title_id', '=', 'titles.title_id')->get();
        $roles = Role::get();

        return view('system.create', compact('systems', 'employees', 'roles'));
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
            'usr_create',
            'emp_id',
            'password',
            'effective_date',
            'expiry_date',
            'system_id',
            'role_id',
            'usr_create',
            'is_active'
        ]);

        $uims_id = System::where('system_name','UIMS')->first();
        $user = Employee::where('emp_id', $request->emp_id)->first();

        if ($request->system_id == $uims_id->system_id) {
            User::create([
                'usr_create' => $request->usr_create,
                'name' => $user->emp_name,
                'email' => $user->ad_id,
                'password' => Hash::make($request->password),
                'role' => $request->role_id,
            ]);
        } else {
            Access::create([
                'usr_create' => $request->usr_create,
                'emp_id' => $request->emp_id,
                'system_id' => $request->system_id,
                'role_id' => $request->role_id,
                'is_active' => $request->is_active,
            ]);
        }

        return redirect()->route('access.create')->with('message','Access user created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function show(Access $access)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function edit(Access $access)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Access $access, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function destroy(Access $access)
    {
        //
    }
}
