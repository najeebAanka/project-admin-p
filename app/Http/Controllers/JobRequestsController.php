<?php

namespace App\Http\Controllers;

use App\Models\JobRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class JobRequestsController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',
       
    ]);

    $data = JobRequest::find($request->id);
        $data->delete();
    return back()->with('msg'  ,'Deleted succesfully');


}

function addItem (Request $request)
{
        

    $request->validate([

        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
       // 'cv' => 'required',
     //   'message' => 'required',
        'job_id' => 'required',
        
    ]);

        $data = new JobRequest();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
      //  $data->cv = $request->cv;
        $data->message ="";
        $data->job_id = $request->job_id;


        if($request->file()) {
        

              

              $fileName = md5(time()).'.'.$request->cv->getClientOriginalExtension();
              $path = date('Y')."/".date('m')."/".date('d')."";
              


            try {
                if (!Storage::disk('public')->has('job-requests/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                    Storage::disk('public')->makeDirectory('job-requests/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                }

                
                $filePath = $request->file('cv')->storeAs("public/job-requests/".$path, $fileName);
                $data->cv = $path."/".$fileName;

                
            } catch (Exception $r) {
           
                response()->json("Failed to upload cv ");
            }



        }

    
    $data->save();
    return  response()->json('Sent successfully!', 200);

         // return back()->with('msg'  ,'Added succesfully');

         // $request = ProjectCategory::all();
    
         //   return response()->json($request);

}


public function getJobRequests()
{


    $request = JobRequest::all();

    return response()->json($request);


}

public function getJobRequestsID($id)
{


    $request = JobRequest::find($id);

    return response()->json($request);


}


}
