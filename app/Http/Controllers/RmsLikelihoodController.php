<?php

namespace App\Http\Controllers;

use App\Models\RmsLikelihood;
use Illuminate\Http\Request;

class RmsLikelihoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $likelihoods = RmsLikelihood::get();

        return view('rms.likelihood.index', compact('likelihoods'));
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

        RmsLikelihood::create($data);

        return redirect()->back()->with('message', 'Likelihood has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RmsLikelihood  $likelihood
     * @return \Illuminate\Http\Response
     */
    public function show(RmsLikelihood $likelihood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RmsLikelihood  $likelihood
     * @return \Illuminate\Http\Response
     */
    public function edit(RmsLikelihood $likelihood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RmsLikelihood  $likelihood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RmsLikelihood $likelihood, $likelihood_id)
    {
        RmsLikelihood::where('likelihood_id', $likelihood_id)
            ->update([
                'likelihood_name' => $request->likelihood_name,
                'likelihood_value' => $request->likelihood_value,
                'usr_update' => $request->usr_update,
                'is_active' => $request->is_active
            ]);

        return redirect()->back()->with('message', 'Likelihood has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RmsLikelihood  $likelihood
     * @return \Illuminate\Http\Response
     */
    public function destroy(RmsLikelihood $likelihood)
    {
        //
    }
}