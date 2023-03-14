<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Content;
use App\Models\Project;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certs = Certificate::get();

        return view('project-management.certificate.index', compact('certs'));
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

        Certificate::create($data);

        return redirect()->route('pmd.cert')->with('message','Certificate has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(certificate $certificate, $cert_id)
    {
        $certs = Certificate::where('cert_id', $cert_id)->first();
        $contents = Content::where('cert_id', $cert_id)->get();
        $projects = Project::get();

        return view('project-management.certificate.view', compact(
            'certs',
            'contents',
            'projects'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate, $cert_id)
    {
        $certs = Certificate::where('cert_id', '=', $cert_id)->get();

        return view('project-management.certificate.edit', compact('certs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate, $cert_id)
    {
        Certificate::where('cert_id', $cert_id)
            ->update([
                'cert_name'=>$request->cert_name,
                'cert_desc'=>$request->cert_desc,
                'keyword'=>$request->keyword,
                'is_active'=>$request->is_active,
                'usr_update'=>$request->usr_update
            ]);

        return redirect()->back()->with('message', 'Drawing has been succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(certificate $certificate)
    {
        //
    }
}
