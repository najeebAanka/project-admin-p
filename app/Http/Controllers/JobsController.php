<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use stdClass;


class JobsController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',
       
    ]);

    $data = Job::find($request->id);
        $data->delete();
    return back()->with('msg'  ,'Deleted succesfully');


}

function addItem (Request $request)
{


    $request->validate([
        
        'title_en' => 'required',
        'title_ar' => 'required',
        'domain_en' => 'required',
        'domain_ar' => 'required',
        'date' => 'required',

    ]);

        $data = new Job();
    $data->title_en = $request->title_en;
    $data->title_ar = $request->title_ar;
    $data->domain_en = $request->domain_en;
    $data->domain_ar = $request->domain_ar;
    $data->date = $request->date;
    $data->save();
    return back()->with('msg'  ,'Added succesfully');


}

    function editItem(Request $request)
    {


        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'domain_en' => 'required',
            'domain_ar' => 'required',
            'date' => 'required',
        ]);

        $data = Job::find($request->id);
        $data->title_en = $request->title_en;
        $data->title_ar = $request->title_ar;
        $data->domain_en = $request->domain_en;
        $data->domain_ar = $request->domain_ar;
        $data->date = $request->date;
        $data->save();
        return back()->with('msg'  ,'Edited successfully');


    }


    public function getJobs()
{
    
    
    
    $lang = $this->getLang();
       
        
        $data = new stdClass();
        
        
        $data = Job::select(['id', 'title_'. $lang .' as title', 'domain_'. $lang .' as domain', 'date' ])->where('id' ,'>' ,0)->get();
        

    return response()->json( $data);
    
    
    


    // $request = Job::all();

    // return response()->json($request);


}






public function getJobsID($id)
{


    $request = Job::find($id);

    return response()->json($request);


}


}
