<?php

namespace App\Http\Controllers;

use App\Models\BigCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use stdClass;

class BigCompaniesController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',
       
    ]);

    $data = BigCompany::find($request->id);
        $data->delete();
    return back()->with('msg'  ,'Deleted succesfully');


}

function addItem (Request $request)
{


    $request->validate([
        
        'name_en' => 'required',
        'name_ar' => 'required',
        'desc_en' => 'required',
        'desc_ar' => 'required',
        'website_link' => 'required',
       
    ]);

        $data = new BigCompany();
    $data->name_en = $request->name_en;
    $data->name_ar = $request->name_ar;

    $data->desc_en = $request->desc_en;
    $data->desc_ar = $request->desc_ar;  
    $data->website_link = $request->website_link;  


  
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
                if (!Storage::disk('public')->has('big-companies/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                    Storage::disk('public')->makeDirectory('big-companies/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                }
                Image::make($file)->resize(512, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/big-companies/' . $name));
                $data->logo_link = $name;
                
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
              'website_link' => 'required',
       
         
        ]);


        $data = BigCompany::find($request->id);
        $data->name_en = $request->name_en;
        $data->name_ar = $request->name_ar;
        $data->desc_en = $request->desc_en;
        $data->desc_ar = $request->desc_ar;  
            $data->website_link = $request->website_link;  


        if ($request->hasFile('image')) {
            $file = $request->only('image')['image'];
            $fileArray = array('image' => $file);
            $rules = array(
                'image' => 'mimes:jpg,png,jpeg,webp|required|max:500000' // max 10000kb
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
                    if (!Storage::disk('public')->has('big-companies/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                        Storage::disk('public')->makeDirectory('big-companies/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                    }
                    Image::make($file)->resize(512, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(storage_path('app/public/big-companies/' . $name));
                    $data->logo_link = $name;
                    
                } catch (Exception $r) {
                    return back()->with('error', "Failed to upload image " . $r);
                }
            }
        }
        $data->save();
        return back()->with('msg'  ,'Edited successfully');


    }


    public function getCompanies()
    {
        
        $lang = $this->getLang();
       
        
        $data = new stdClass();
        
        
        $data = BigCompany::select(['id', 'name_'. $lang .' as name', 'desc_'. $lang .' as desc', 'logo_link' ,'website_link'])->where('id' ,'>' ,0)->get();
        
    
         foreach( $data  as $one){
            
            $one->logo_link = $one->buildIcon();
            
        
           }

         return response()->json( $data);       
        
        
        
        


        // $request = Company::all();
        
        // foreach($request  as $one){
            
        //     $one->icon_img = $one->buildIcon();
            
        
        // }

        // return response()->json($request);


    }
    
    
    
    
    
    
    
    
    
    

    // public function getCompaniesID($id)
    // {


    //     $request = Company::find($id);
        
    
            
    //         $request->icon_img = $request->buildIcon();
            
        

    //     return response()->json($request);


    // }

}
