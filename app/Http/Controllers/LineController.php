<?php

namespace App\Http\Controllers;

use App\Models\MisLine;
use Illuminate\Http\Request;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lines = MisLine::get();

        return view('master-list.line.index', compact('lines'));
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
        if (MisLine::where('line_name', $request->line_name)->exists()) {

            return redirect()->back()->with('error', 'Line already existed.');

        } else {

            $data = $request->all();

            MisLine::create($data);

            return redirect()->back()->with('message', 'Line has been created successfully.');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $line_id)
    {
        MisLine::where('line_id', $line_id)
            ->update([
                'line_name' => $request->line_name,
                'usr_update' => $request->usr_update,
                'is_active' => $request->is_active
            ]);

        return redirect()->back()->with('message', 'Line has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
