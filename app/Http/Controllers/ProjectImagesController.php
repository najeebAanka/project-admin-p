<?php

namespace App\Http\Controllers;

use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;

class ProjectImagesController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',
       
    ]);

    $data = ProjectImage::find($request->id);
        $data->delete();
    return back()->with('msg'  ,'Deleted succesfully');


}

function addItem (Request $request)
{
        

    $request->validate([

        'project_id' => 'required',
        
    ]);

        $data = new ProjectImage();

        $data->project_id = $request->project_id;
    
    

    if ($request->hasFile('image')) {
        $file = $request->only('image')['image'];
        $fileArray = array('image' => $file);
        $rules = array(
            'image' => 'mimes:jpg,png,jpeg|required|max:500000' // max 10000kb
        );
        $validator = Validator::make($fileArray, $rules);
        if ($validator->fails()) {
            return back()->with('error', "Image validation says it is not correct");
            ;
        } else {
            $uniqueFileName = uniqid()
                    . '.' . $file->getClientOriginalExtension();
            $name = date('Y') . "/" . date("m") . "/" . date("d") . "/" . $uniqueFileName;
            try {
                if (!Storage::disk('public')->has('projects/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                    Storage::disk('public')->makeDirectory('projects/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                }
                Image::make($file)->resize(512, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/projects/' . $name));
                $data->image = $name;
                
            } catch (Exception $r) {
                return back()->with('error', "Failed to upload image " . $r);
            }
        }
    }
    $data->save();
    return back()->with('msg'  ,'Added succesfully');


}

    function editItem(Request $request)
    {


        $request->validate([

            'project_id' => 'required',
            
        
    ]);


        $data = ProjectImage::find($request->id);
        $data->project_id = $request->project_id;

        if ($request->hasFile('image')) {
            $file = $request->only('image')['image'];
            $fileArray = array('image' => $file);
            $rules = array(
                'image' => 'mimes:jpg,png,jpeg|required|max:500000' // max 10000kb
            );
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                return back()->with('error', "Image validation says it is not correct");
                ;
            } else {
                $uniqueFileName = uniqid()
                        . '.' . $file->getClientOriginalExtension();
                $name = date('Y') . "/" . date("m") . "/" . date("d") . "/" . $uniqueFileName;
                try {
                    if (!Storage::disk('public')->has('projects/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                        Storage::disk('public')->makeDirectory('projects/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                    }
                    Image::make($file)->resize(512, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(storage_path('app/public/projects/' . $name));
                    $data->image = $name;
                    
                } catch (Exception $r) {
                    return back()->with('error', "Failed to upload image " . $r);
                }
            }
        }


        $data->save();
        return back()->with('msg'  ,'Edited successfully');


    }


    
    public function getProjectImages(Request $request)
{


    $data = ProjectImage::all();
    
    
    
    
    if($request->has('proj')){
        
     $data = $data->where('project_id' ,$request->proj)   ;
        
    }
    
    
    
    
    foreach($data  as $one){
            
            $one->image = $one->buildIcon();
            
        
        }

    return response()->json($data);


}

public function getProjectImagesID($id)
{


    $request = ProjectImage::find($id);
    

            
            $request->image = $request->buildIcon();
            
        
        

    return response()->json($request);


}

}
