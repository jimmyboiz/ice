<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
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

        Item::create($data);

        return redirect()->back()->with('message', 'Item has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item, $item_id)
    {
        Item::where('item_id', $item_id)
            ->update([
                'item_desc'=>$request->item_desc,
                'item_vendor'=>$request->item_vendor,
                'item_PIC'=>$request->item_PIC,
                'item_PIC_email'=>$request->item_PIC_email,
                'start_date'=>$request->start_date,
                'expiry_date'=>$request->expiry_date,
                'keyword'=>$request->keyword,
                'usr_update'=>$request->usr_update,
                'project_id'=>$request->project_id,
                'is_active'=>$request->is_active,
            ]);

        return redirect()->back()->with('message', 'Item has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}