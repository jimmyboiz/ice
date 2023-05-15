<?php

namespace App\Http\Controllers;

use App\Models\RmsRating;
use Illuminate\Http\Request;

class RmsRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = RmsRating::get();

        return view('rms.rating.index', compact('ratings'));
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

        RmsRating::create($data);

        return redirect()->back()->with('message','Rating has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RmsRating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(RmsRating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RmsRating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(RmsRating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RmsRating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RmsRating $rating, $rating_id)
    {
        RmsRating::where('rating_id', $rating_id)
                ->update([
                    'rating_name'=>$request->rating_name,
                    'usr_update'=>$request->usr_update,
                    'is_active'=>$request->is_active
                ]);
        
        return redirect()->back()->with('message', 'Rating has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RmsRating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(RmsRating $rating)
    {
        //
    }
}
