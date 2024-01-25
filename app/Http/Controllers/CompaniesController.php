<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use stdClass;

class CompaniesController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',
       
    ]);

    $data = Company::find($request->id);
        $data->delete();
    return back()->with('msg'  ,'Deleted succesfully');


}

function addItem (Request $request)
{


    $request->validate([
        
        'name_en' => 'required',
        'name_ar' => 'required',
        'url' => 'required',
        'order_index' => 'required',
    ]);

        $data = new Company();
    $data->name_en = $request->name_en;
    $data->name_ar = $request->name_ar;
    $data->url = $request->url;
    $data->order_index = $request->order_index;
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
                if (!Storage::disk('public')->has('companies/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                    Storage::disk('public')->makeDirectory('companies/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                }
                Image::make($file)->resize(512, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/companies/' . $name));
                $data->icon_img = $name;
                
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
            'url' => 'required',
            'order_index' => 'required',
        ]);


        $data = Company::find($request->id);
        $data->name_en = $request->name_en;
        $data->name_ar = $request->name_ar;
        $data->url = $request->url;
        $data->order_index = $request->order_index;

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
                    if (!Storage::disk('public')->has('companies/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                        Storage::disk('public')->makeDirectory('companies/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                    }
                    Image::make($file)->resize(512, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(storage_path('app/public/companies/' . $name));
                    $data->icon_img = $name;
                    
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
        
        
        $data = Company::select(['id', 'name_'. $lang .' as name', 'icon_img', 'url', 'order_index'.' as index'])->where('id' ,'>' ,0)->orderBy('order_index' ,'asc')->get();
        
    
         foreach( $data  as $one){
            
            $one->icon_img = $one->buildIcon();
            
        
           }

         return response()->json( $data);       
        
        
        
        


        // $request = Company::all();
        
        // foreach($request  as $one){
            
        //     $one->icon_img = $one->buildIcon();
            
        
        // }

        // return response()->json($request);


    }
    
    
    
    
    
    
    
    
    
    

    public function getCompaniesID($id)
    {


        $request = Company::find($id);
        
    
            
            $request->icon_img = $request->buildIcon();
            
        

        return response()->json($request);


    }

}
