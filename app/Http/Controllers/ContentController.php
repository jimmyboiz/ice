<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
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

        Content::create($data);

        return redirect()->back()->with('message','Document has been added successfully.');
    }

    public function storeSubContent(Request $request)
    {
        Content::create([
            'content_name'=>$request->content_name,
            'content_link'=>$request->content_link,
            'content_path'=>$request->content_path,
            'keyword'=>$request->keyword,
            'project_id'=>$request->project_id,
            'expiry_date'=>$request->expiry_date,
            'subgroup_id'=>$request->subgroup_id,
            'content_category'=>$request->content_category,
            'usr_create'=>$request->usr_create,
            'is_active'=>$request->is_active
        ]);

        return redirect()->back()->with('message','Document has been added successfully.');
    }

    //Added by azim.kamarudin (KIV)
    public function storeAgreement(Request $request)
    {
        $request->validate([
            'usr_create',
            'content_name',
            'content_link',
            'content_path',
            'content_category',
            'expiry_date',
            'keyword',
            'agreement_id',
            'project_id'
        ]);

        $data = $request->all();

        Content::create($data);

        return redirect()->route('pmd.agreement')->with('message','Agreement has been created successfully.');
    }

    public function storeEnvironment(Request $request)
    {
        $request->validate([
            'usr_create',
            'content_name',
            'content_link',
            'content_path',
            'content_category',
            'expiry_date',
            'keyword',
            'environment_id',
            'project_id'
        ]);

        $data = $request->all();

        Content::create($data);

        return redirect()->route('pmd.viewEnvironmental', [$request->environment_id])->with('message','Environmental has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content, $id)
    {
        $request->validate([
            'content_name' => 'required',
            'content_link' => 'required',
        ]);

        Content::where('content_id',$id)
              ->update([
                'content_name'=>$request->content_name,
                'content_link'=>$request->content_link,
                'content_path'=>$request->content_path,
                'project_id'=>$request->project_id,
                'keyword'=>$request->keyword,
                'is_active'=>$request->is_active,
                'usr_update'=>$request->usr_update,
                'expiry_date'=>$request->expiry_date,
            ]);

            return redirect()->back()->with('message', 'Content has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }
}
