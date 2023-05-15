<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Item;
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

            $searchContents = Content::leftjoin('projects','contents.project_id','=','projects.project_id')
                                     ->where('content_name', 'LIKE','%'.$request->search.'%')
                                     ->orWhere('content_link', 'LIKE','%'.$request->search.'%')
                                     ->orWhere('content_category', 'LIKE','%'.$request->search.'%')
                                     ->orWhere('keyword', 'LIKE','%'.$request->search.'%')
                                     ->get();

            // $searchContents = Item::where('item_desc', 'LIKE','%'.$request->search.'%')
            //                       ->get();
            return view('project-management.search', compact('searchContents'));

        }else{

            $searchContents = Content::where('content_name','AAAA')->get();

            return view('project-management.search', compact('searchContents'))->with('message','Search fill is empty');;

        }
    }
}
