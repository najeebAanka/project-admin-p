<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use stdClass;

class BlogsController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',
       
    ]);

    $data = Blog::find($request->id);
        $data->delete();
    return back()->with('msg'  ,'Deleted succesfully');


}

function addItem (Request $request)
{


    $request->validate([
        
        'name_en' => 'required',
        'name_ar' => 'required',
        'desc_ar' => 'required',
        'desc_en' => 'required',
    ]);

        $data = new Blog();
    $data->name_en = $request->name_en;
    $data->name_ar = $request->name_ar;
    $data->desc_en = $request->desc_en;
    $data->desc_ar = $request->desc_ar;
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
                if (!Storage::disk('public')->has('blogs/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                    Storage::disk('public')->makeDirectory('blogs/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                }
                Image::make($file)->resize(512, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/blogs/' . $name));
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
            'desc_en' => 'required',
            'desc_ar' => 'required',
        ]);


        $data = Blog::find($request->id);
        $data->name_en = $request->name_en;
        $data->name_ar = $request->name_ar;
        $data->desc_en = $request->desc_en;
        $data->desc_ar = $request->desc_ar;

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
                    if (!Storage::disk('public')->has('blogs/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                        Storage::disk('public')->makeDirectory('blogs/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                    }
                    Image::make($file)->resize(512, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(storage_path('app/public/blogs/' . $name));
                    $data->img = $name;
                    
                } catch (Exception $r) {
                    return back()->with('error', "Failed to upload image " . $r);
                }
            }
        }
        $data->save();
        return back()->with('msg'  ,'Edited successfully');


    }




           
            public function getBlogs()
            {
                
                
                
                $lang = $this->getLang();
       
        
                 $data = new stdClass();
        
        
                $data = Blog::select(['id', 'name_'. $lang .' as name', 'desc_'. $lang .' as description',
                'img'])->where('id' ,'>' ,0)->get();
                  
                  
                  
                  
              foreach( $data  as $one){
            
                $one->img = $one->buildIcon();
            
        
               }
               
               

            return response()->json($data);
                
                
        
        
                // $request = Blog::all();
                
                // foreach($request  as $one){
            
                //     $one->img = $one->buildIcon();
            
                //  }
        
                // return response()->json($request);
        
        
            }
        
        
        
        
        
        
        
        
        
        
          
            public function getBlogsID($id)
            {
        
        
                $request = Blog::find($id);
                
            
            $request->img = $request->buildIcon();
            
                
        
                return response()->json($request);
        
        
            }




}
