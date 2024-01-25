<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use stdClass;


class TestimonialsController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',
       
    ]);

    $data = Testimonial::find($request->id);
        $data->delete();
    return back()->with('msg'  ,'Deleted succesfully');


}

function addItem (Request $request)
{


    $request->validate([
        
        'name_en' => 'required',
        'name_ar' => 'required',
        'short_desc_en' => 'required',
        'short_desc_ar' => 'required',
        'desc_en' => 'required',
        'desc_ar' => 'required',
        'company_name_en' => 'required',
        'company_name_ar' => 'required',
    ]);

        $data = new Testimonial();
    $data->name_en = $request->name_en;
    $data->name_ar = $request->name_ar;
    $data->short_desc_en = $request->short_desc_en;
    $data->short_desc_ar = $request->short_desc_ar;
    $data->desc_en = $request->desc_en;
    $data->desc_ar = $request->desc_ar;
    $data->company_name_en = $request->company_name_en;
    $data->company_name_ar = $request->company_name_ar;
    $data->save();
    return back()->with('msg'  ,'Added succesfully');


}

    function editItem(Request $request)
    {


        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'short_desc_en' => 'required',
            'short_desc_ar' => 'required',
            'desc_en' => 'required',
            'desc_ar' => 'required',
            'company_name_en' => 'required',
            'company_name_ar' => 'required',
        ]);

        $data = Testimonial::find($request->id);
        $data->name_en = $request->name_en;
        $data->name_ar = $request->name_ar;
        $data->short_desc_en = $request->short_desc_en;
        $data->short_desc_ar = $request->short_desc_ar;
        $data->desc_en = $request->desc_en;
        $data->desc_ar = $request->desc_ar;
        $data->company_name_en = $request->company_name_en;
        $data->company_name_ar = $request->company_name_ar;
        $data->save();
        return back()->with('msg'  ,'Edited successfully');

    }



    public function getTestimonials()
    {
        
        
       
        $lang = $this->getLang();
       
        
        $data = new stdClass();
        
        
        $data = Testimonial::select(['id', 'short_desc_'. $lang .' as short_description', 'desc_'. $lang .' as description',
        'name_'. $lang .' as name', 'company_name_'. $lang .' as company'])->where('id' ,'>' ,0)->get();
        

        return response()->json( $data);
        
        
    //---------------------------------------------------get by lang
    
        
        // $lang = $this->getLang();
       
        
        // $data = new stdClass();
        
        // if($lang == 'en'){
        
        // $data = Testimonial::select(['id', 'short_desc_'. $lang .' as short_description', 'desc_'. $lang .' as description',
        // 'name_'. $lang .' as name', 'company_name_'. $lang .' as company'])->whereNull('desc_ar')->get();}
        
        // elseif($lang == 'ar'){
            
        // $data = Testimonial::select(['id', 'short_desc_'. $lang .' as short_description', 'desc_'. $lang .' as description',
        // 'name_'. $lang .' as name', 'company_name_'. $lang .' as company'])->whereNull('desc_en')->get();}
        

        // return response()->json( $data);
        
        
    
    //----------------------------------------------get all
        // $request = Testimonial::all();
    
        // return response()->json($request);
    
    
    }
    
    
    
    
    
    
    
    
    public function getTestimonialsID($id)
    {
    
    
        $request = Testimonial::find($id);
    
        return response()->json($request);
    
    
    }



}
