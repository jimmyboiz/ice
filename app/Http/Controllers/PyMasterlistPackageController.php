<?php

namespace App\Http\Controllers;

use App\Models\PyDrawingDetail;
use App\Models\Project;
use App\Models\PyMasterlistPackage;
use Illuminate\Http\Request;

class PyMasterlistPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('project-management.masterlist-drawing.index');
    }

    public function search(Request $request)
    {
        // if(!empty($request->draw_no)){

        $searchDrawings = PyDrawingDetail::leftjoin('py_masterlist_packages', 'py_drawing_details.masterlist_package_id', '=', 'py_masterlist_packages.masterlist_package_id')
            ->leftjoin('projects', 'py_drawing_details.project_id', 'projects.project_id')
            ->when($request->has('draw_no'), function ($query) use ($request) {
                return $query->where('py_drawing_details.drawing_detail_no', 'LIKE', '%' . $request->draw_no . '%');
            }, function ($query) {
            return $query->where('py_drawing_details.drawing_detail_no', 'No Data')
                ->where('py_drawing_details.drawing_detail_desc', 'No Data')
                ->where('py_drawing_details.drawing_detail_transmittal_no', 'No Data');
        })
            ->when($request->has('draw_desc'), function ($query) use ($request) {
                return $query->where('py_drawing_details.drawing_detail_desc', 'LIKE', '%' . $request->draw_desc . '%');
            })
            // ->when($request->has('trans_no'), function ($query) use ($request) {
            //     return $query->where('py_drawing_details.drawing_detail_transmittal_no', 'LIKE', '%' . $request->trans_no . '%');
            // })
            ->get();

        $projects = Project::get();
        // dd($request->trans_no, );
        return view('project-management.masterlist-drawing.index', compact('searchDrawings', 'projects'));

        // }else{



        //     $searchDrawings = PyDrawingDetail::where('drawing_detail_no','No Data')->get();
        //     $projects = Project::get();

        //     return view('project-management.masterlist-drawing.index', compact('searchDrawings', 'projects'))->with('message','Search fill is empty');;

        // }
        // ->where('py_drawing_details.drawing_detail_no', 'LIKE','%'.$request->draw_no.'%')
        // ->orWhere('py_drawing_details.drawing_detail_desc', 'LIKE','%'.$request->draw_desc.'%')
        // ->orWhere('py_drawing_details.drawing_detail_transmittal_no', 'LIKE','%'.$request->trans_no.'%')
    }

    public function getMasterPackage($masterlist_package_id)
    {
        $data = PyMasterlistPackage::where('masterlist_package_id', $masterlist_package_id)->first();
        // \Log::info($data);
        return response()->json($data);
    }

    public function create()
    {
        $masterPackages = PyMasterlistPackage::get();
        $projects = Project::where('is_active', 'Y')->get();
        return view('project-management.masterlist-drawing.create', compact('masterPackages', 'projects'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drawings = PyDrawingDetail::where('drawing_detail_id', $id)
            ->join('projects', 'py_drawing_details.project_id', 'projects.project_id')
            ->join('py_masterlist_packages', 'py_drawing_details.masterlist_package_id', '=', 'py_masterlist_packages.masterlist_package_id')
            ->first();
        $projects = Project::get();

        return view('project-management.masterlist-drawing.view', compact('drawings', 'projects'));
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
    public function update(Request $request, $id)
    {
        PyDrawingDetail::where('drawing_detail_id', $id)
            ->update([
                'drawing_detail_transmittal_no' => $request->transmittal_number,
                'drawing_detail_no' => $request->drawing_number,
                'drawing_detail_rev' => $request->drawing_rev,
                'drawing_detail_desc' => $request->drawing_description,
                'project_id' => $request->project_id,
                'is_active' => $request->is_active,
                'usr_update' => $request->usr_update,
            ]);

        return redirect()->route('pmd.masterlistDrawing')->with('message', $request->drawing_number . ' Successfully Updated.');
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