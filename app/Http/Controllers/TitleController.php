<?php

namespace App\Http\Controllers;

use App\Models\MisTitle;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = MisTitle::get();

        return view('master-list.title.index', compact('titles'));
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
        if (MisTitle::where('title_desc', $request->title_desc)->exists()) {

            return redirect()->back()->with('error', 'Title already existed.');

        } else {

            $data = $request->all();

            MisTitle::create($data);

            return redirect()->back()->with('message', 'Title has been created successfully.');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MisTitle  $title
     * @return \Illuminate\Http\Response
     */
    public function show(MisTitle $title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MisTitle  $title
     * @return \Illuminate\Http\Response
     */
    public function edit(MisTitle $title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MisTitle  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MisTitle $title, $title_id)
    {
        MisTitle::where('title_id', $title_id)
            ->update([
                'title_desc' => $request->title_desc,
                'usr_update' => $request->usr_update,
                'is_active' => $request->is_active
            ]);

        return redirect()->back()->with('message', 'Title has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MisTitle  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy(MisTitle $title)
    {
        //
    }
}