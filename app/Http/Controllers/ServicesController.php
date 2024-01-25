<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Service;
use App\Models\ServiceTab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Exception;
use Illuminate\Routing\Route;
use Intervention\Image\ImageManagerStatic as Image;
use stdClass;

class ServicesController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',
       
    ]);

    $data = Service::find($request->id);
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

        $data = new Service();
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
                if (!Storage::disk('public')->has('services/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                    Storage::disk('public')->makeDirectory('services/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                }
                Image::make($file)->resize(512, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/services/' . $name));
                $data->cover_img = $name;
                
            } catch (Exception $r) {
                return back()->with('error', "Failed to upload image " . $r);
            }
        }
    }
    if ($request->hasFile('icon')) {
        $file = $request->only('icon')['icon'];
        $fileArray = array('icon' => $file);
        $rules = array(
            'icon' => 'mimes:jpg,png,jpeg|required|max:500000' // max 10000kb
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
                if (!Storage::disk('public')->has('services/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                    Storage::disk('public')->makeDirectory('services/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                }
                Image::make($file)->resize(512, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/services/' . $name));
                $data->icon_img = $name;
                
            } catch (Exception $r) {
                return back()->with('error', "Failed to upload image " . $r);
            }
        }
    }
    
    
//     $attibute_name = 'service_file';
//     $filePath = '';
//     if ($request->hasFile($attibute_name)) {
//     $fileName = md5(time()) . '.' . $request->{$attibute_name}->getClientOriginalExtension();
//   // $path = asset('storage/services/').'/' . date('Y') . "-" . date('m') . "-" . date('d') . "en";
//     $path = "services/files/" . date('Y') . "-" . date('m') . "-" . date('d') . "en";
//     $filePath = $request->file($attibute_name)->storeAs($path, $fileName, 'public');
//     $data->service_file = $filePath;
     
     
//     }



if($request->file()) {
        

              

              $fileName = md5(time()).'.'.$request->service_file->getClientOriginalExtension();
              $path = date('Y')."/".date('m')."/".date('d')."";
              


            try {
                if (!Storage::disk('public')->has('services/files/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                    Storage::disk('public')->makeDirectory('services/files/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                }

                
                $filePath = $request->file('service_file')->storeAs("public/services/files/".$path, $fileName);
                $data->service_file = $path."/".$fileName;

                
            } catch (Exception $r) {
                return back()->with('error', "Failed to upload image " . $r);
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


        $data = Service::find($request->id);
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
                    if (!Storage::disk('public')->has('services/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                        Storage::disk('public')->makeDirectory('services/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                    }
                    Image::make($file)->resize(512, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(storage_path('app/public/services/' . $name));
                    $data->cover_img = $name;
                    
                } catch (Exception $r) {
                    return back()->with('error', "Failed to upload image " . $r);
                }
            }
        }
        if ($request->hasFile('icon')) {
            $file = $request->only('icon')['icon'];
            $fileArray = array('icon' => $file);
            $rules = array(
                'icon' => 'mimes:jpg,png,jpeg|required|max:500000' // max 10000kb
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
                    if (!Storage::disk('public')->has('services/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                        Storage::disk('public')->makeDirectory('services/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                    }
                    Image::make($file)->resize(512, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(storage_path('app/public/services/' . $name));
                    $data->icon_img = $name;
                    
                } catch (Exception $r) {
                    return back()->with('error', "Failed to upload image " . $r);
                }
            }
        }
        
        
        
        if($request->file()) {
        

              

              $fileName = md5(time()).'.'.$request->service_file->getClientOriginalExtension();
              $path = date('Y')."/".date('m')."/".date('d')."";
              


            try {
                if (!Storage::disk('public')->has('services/files/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                    Storage::disk('public')->makeDirectory('services/files/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                }

                
                $filePath = $request->file('service_file')->storeAs("public/services/files/".$path, $fileName);
                $data->service_file = $path."/".$fileName;

                
            } catch (Exception $r) {
                return back()->with('error', "Failed to upload image " . $r);
            }



        }
        
        
        
        $data->save();
        return back()->with('msg'  ,'Edited successfully');


    }


    public function getServices()
    {
        
        
        
        
        $lang = $this->getLang();
       
        
        $data = new stdClass();
        
        
        $data = Service::select(['id', 'name_'. $lang .' as name', 'desc_'. $lang .' as description',
        'cover_img', 'icon_img', 'service_file'])->where('id' ,'>' ,0)->get();
      
        
        
        foreach($data  as $one){

            $one->service_file = $one->buildFile();
            
            $one->tabs = ServiceTab::select(['id' ,'name_'. $lang .' as name', 'desc_'. $lang .' as description', 'service_id'])->where('service_id', $one->id)->get();
             
            $one->cover_img = $one->buildImage();
            $one->icon_img = $one->buildIcon();
            
        }
        
        
        

    return response()->json( $data);
        
        
        
    
    
        // $request = Service::all();
        
        // foreach($request  as $one){
            
        //     $one->icon_img = $one->buildIcon();
        
            
        //     $one->cover_img = $one->buildImage();
            
        
        
        // }
    
        // return response()->json($request);
    
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
    public function getServicesID($id)
    {
    
    
        $request = Service::find($id);
        
    
            
            $request->icon_img = $request->buildIcon();
            
            
            $request->cover_img = $request->buildImage();
            
        
    
        return response()->json($request);

    
    
    }

}
