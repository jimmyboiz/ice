<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchContents = Content::get();
        return view('project-management.search', compact('searchContents'));
    }

    public function search(Request $request)
    {
        if(!empty($request->search)){

            $searchContents = Content::where('content_name', 'LIKE','%'.$request->search.'%')
                                     ->orWhere('content_link', 'LIKE','%'.$request->search.'%')
                                     ->orWhere('content_category', 'LIKE','%'.$request->search.'%')
                                     ->orWhere('keyword', 'LIKE','%'.$request->search.'%')
                                     ->get();

            return view('project-management.search', compact('searchContents'));

        }else{

            $searchContents = Content::where('content_name','AAAA')->get();

            return view('project-management.search', compact('searchContents'))->with('message','Search fill is empty');;

        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function show(Search $search)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function edit(Search $search)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Search $search)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function destroy(Search $search)
    {
        //
    }
}
