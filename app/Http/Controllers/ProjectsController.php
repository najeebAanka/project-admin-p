<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use stdClass;


class ProjectsController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',
       
    ]);

    $data = Project::find($request->id);
        $data->delete();
    return back()->with('msg'  ,'Deleted succesfully');


}

function addItem (Request $request)
{


    $request->validate([
        
        'name_en' => 'required',
        'name_ar' => 'required',
        'short_desc_ar' => 'required',
		'short_desc_en' => 'required',
        'desc_en' => 'required',
        'desc_ar' => 'required',
       
        'client_ar' => 'required',
		'client_en' => 'required',
		'status_ar' => 'required',
		'status_en' => 'required',
		'start_date' => 'required',
		'end_date' => 'required',
		'category_id' => 'required'
    ]);

        $data = new Project();
    $data->name_en = $request->name_en;
    $data->name_ar = $request->name_ar;
    $data->short_desc_en = $request->short_desc_en;
    $data->short_desc_ar = $request->short_desc_ar;
    $data->desc_en = $request->desc_en;
    $data->desc_ar = $request->desc_ar;
   
    $data->client_en = $request->client_en;
    $data->client_ar = $request->client_ar;
    $data->status_en = $request->status_en;
    $data->status_ar = $request->status_ar;
    $data->start_date = $request->start_date;
    $data->end_date = $request->end_date;
    $data->category_id = $request->category_id;


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
                $data->img = $name;
                
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
        
        'name_en' => 'required',
        'name_ar' => 'required',
        'short_desc_ar' => 'required',
		'short_desc_en' => 'required',
        'desc_en' => 'required',
        'desc_ar' => 'required',
        
        'client_ar' => 'required',
		'client_en' => 'required',
		'status_ar' => 'required',
		'status_en' => 'required',
		'start_date' => 'required',
		'end_date' => 'required',
		'category_id' => 'required'
        ]);

        $data = Project::find($request->id);
    $data->name_en = $request->name_en;
    $data->name_ar = $request->name_ar;
    $data->short_desc_en = $request->short_desc_en;
    $data->short_desc_ar = $request->short_desc_ar;
    $data->desc_en = $request->desc_en;
    $data->desc_ar = $request->desc_ar;

    $data->client_en = $request->client_en;
    $data->client_ar = $request->client_ar;
    $data->status_en = $request->status_en;
    $data->status_ar = $request->status_ar;
    $data->start_date = $request->start_date;
    $data->end_date = $request->end_date;
    $data->category_id = $request->category_id;


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
                $data->img = $name;
                
            } catch (Exception $r) {
                return back()->with('error', "Failed to upload image " . $r);
            }
        }
    }


        $data->save();
        return back()->with('msg'  ,'Edited successfully');


    }
    
    
    
    


    public function getProjects(Request $request)
{
    
    $lang = $this->getLang();
       
        
        $data = new stdClass();
        

        
        $data = Project::select(['id', 'name_'. $lang .' as name', 'short_desc_'. $lang .' as short_description', 'desc_'. $lang .' as description',
        'img', 'client_'. $lang .' as client', 'status_'. $lang .' as status', 'start_date', 'end_date', 'category_id'])->where('id' ,'>' ,0)->get();
        
        
        
        
        if($request->has('cat')){
        
     $data = $data->where('category_id' ,$request->cat)   ;
        
    }
    
    
    // foreach( $data  as $o){
            
        
    //         $o->categoryName = ProjectCategory::select(['name_'. $lang .' as name'])->where('id', $o->category_id)->first()->name;
            
           
    //     }
        
    
    
    foreach( $data  as $one){
        
        
           $one->categoryName = ProjectCategory::select(['name_'. $lang .' as name'])->where('id', $one->category_id)->first()->name;
        
            
            $one->img = $one->buildImage();
            
            $one->gallery = ProjectImage::select(['id' ,'image', 'project_id'])->where('project_id', $one->id)->get();
            
           
           $request_ = $one->gallery;
    
             foreach($request_  as $one_){
            
            $one_->image = $one_->buildIcon();
            
        
        }
        
        
        
        }
        
        

    return response()->json( $data);


    // $data = Project::where('id' ,'>' ,0);
    // if($request->has('cat')){
        
    //  $data = $data->where('category_id' ,$request->cat)   ;
        
    // }
    //   $data =   $data->get();
    
    // foreach( $data  as $one){
            
    //         $one->img = $one->buildImage();
            
        
    //     }

    // return response()->json( $data);


}







public function getProjectsID(Request $request, $id)
{
    $lang = $this->getLang();
       
        
        $request = new stdClass();


         $request = Project::select(['id', 'name_'. $lang .' as name', 'short_desc_'. $lang .' as short_description', 'desc_'. $lang .' as description',
        'img', 'client_'. $lang .' as client', 'status_'. $lang .' as status', 'start_date', 'end_date', 'category_id'])->where('id' ,'>' ,0)->find($id);

  //  $request = Project::find($id);
  //  $request->img = $request->buildImage();
   
            
            $request->img = $request->buildImage();
            
            $request->categoryName = ProjectCategory::select(['name_'. $lang .' as name'])->where('id', $request->category_id)->first()->name;
            
             $request->gallery = ProjectImage::select(['id' ,'image', 'project_id'])->where('project_id', $request->id)->get();
             
             
             $request_ = $request->gallery;
    
             foreach($request_  as $one_){
            
            $one_->image = $one_->buildIcon();
            
        
            }
            
            
            
        

    return response()->json($request);


}


}
