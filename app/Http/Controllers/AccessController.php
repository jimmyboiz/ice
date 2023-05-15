<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\CdeEmployee;
use App\Models\Role;
use App\Models\System;
use App\Models\MisTitle;
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
        $accesses = Access::leftJoin('cde_employees', 'cde_employees.emp_id', '=', 'accesses.emp_id')
            ->leftJoin('roles', 'roles.role_id', '=', 'accesses.role_id')
            ->leftJoin('systems', 'systems.system_id', '=', 'accesses.system_id')
            ->get();
        $roles = Role::get();

        return view('system.access-list', compact('accesses', 'roles'));
    }

    public function pyAccess()
    {
        $accesses = Access::leftJoin('cde_employees', 'cde_employees.emp_id', '=', 'accesses.emp_id')
            ->leftJoin('roles', 'roles.role_id', '=', 'accesses.role_id')
            ->leftJoin('systems', 'systems.system_id', '=', 'accesses.system_id')
            ->where('accesses.system_id', '=', '46')
            // ->where('accesses.is_active', '=', 'Y')
            ->get();
        $roles = Role::get();

        return view('project-management.users', compact('accesses', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $systems = System::where('system_id', '=', $request->system_id)->first();
        $employees = CdeEmployee::leftJoin('mis_titles', 'cde_employees.title_id', '=', 'mis_titles.title_id')->get();
        $roles = Role::where('system_id', '=', $request->system_id)->get();

        return view('system.create', compact('systems', 'employees', 'roles'));
    }

    public function showSystem()
    {
        $systems = System::where('system_name', 'not like', 'DB%')
            ->where('is_active', 'Y')
            ->get();
        $employees = CdeEmployee::leftJoin('mis_titles', 'cde_employees.title_id', '=', 'mis_titles.title_id')->get();
        $roles = Role::get();

        return view('system.system-select', compact('systems', 'employees', 'roles'));
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

        // $uims = System::where('system_id','45')->first();
        // $pyline = System::where('system_id','46')->first();
        $user = CdeEmployee::where('emp_id', $request->emp_id)->first();
        $domain = '@mymrt.com.my';

        if ($request->system_id == 45 || $request->system_id == 46) {
            if (User::where('email', $user->ad_id)->exists()) {
                Access::create([
                    'usr_create' => $request->usr_create,
                    'emp_id' => $request->emp_id,
                    'system_id' => $request->system_id,
                    'role_id' => $request->role_id,
                    'expiry_date' => $request->expiry_date,
                    'effective_date' => $request->effective_date,
                    'is_active' => $request->is_active,
                ]);
                return redirect()->route('access.showSystem')->with('message', 'Access successfully created');
            } else {
                User::create([
                    'usr_create' => $request->usr_create,
                    'name' => $user->emp_name,
                    'email_noti' => $user->ad_id . $domain,
                    'email' => $user->ad_id,
                    'password' => Hash::make($request->password),
                    'role_id' => $request->role_id,
                    'emp_id' => $request->emp_id,
                ]);
                Access::create([
                    'usr_create' => $request->usr_create,
                    'emp_id' => $request->emp_id,
                    'system_id' => $request->system_id,
                    'role_id' => $request->role_id,
                    'expiry_date' => $request->expiry_date,
                    'effective_date' => $request->effective_date,
                    'is_active' => $request->is_active,
                ]);
                return redirect()->route('access.showSystem')->with('message', 'Access successfully created');
            }
        } else {
            Access::create([
                'usr_create' => $request->usr_create,
                'emp_id' => $request->emp_id,
                'system_id' => $request->system_id,
                'role_id' => $request->role_id,
                'expiry_date' => $request->expiry_date,
                'effective_date' => $request->effective_date,
                'is_active' => $request->is_active,
            ]);
            return redirect()->route('access.showSystem')->with('message', 'Access successfully created');
        }



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
    public function updateAccess(Request $request, Access $access, $access_id)
    {
        Access::where('access_id', $access_id)
            ->update([
                'role_id' => $request->role_id,
                'effective_date' => $request->effective_date,
                'expiry_date' => $request->expiry_date,
                'usr_update' => $request->usr_update,
                'is_active' => $request->is_active
            ]);

        return redirect()->back()->with('message', 'User access has been succesfully updated.');
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