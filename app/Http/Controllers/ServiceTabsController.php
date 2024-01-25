<?php

namespace App\Http\Controllers;

use App\Models\ServiceTab;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadesRoute;
use stdClass;

class ServiceTabsController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',
       
    ]);

    $data = ServiceTab::find($request->id);
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
        'service_id' => 'required',
    ]);

        $data = new ServiceTab();
    $data->name_en = $request->name_en;
    $data->name_ar = $request->name_ar;
    $data->desc_en = $request->desc_en;
    $data->desc_ar = $request->desc_ar;
    $data->service_id = $request->service_id;
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
            'service_id' => 'required',
        ]);

        $data = ServiceTab::find($request->id);
        $data->name_en = $request->name_en;
        $data->name_ar = $request->name_ar;
        $data->desc_en = $request->desc_en;
        $data->desc_ar = $request->desc_ar;
        $data->service_id = $request->service_id;
        $data->save();
        return back()->with('msg'  ,'Edited successfully');


    }

    public function getServiceTabs(Request $request)
        {
            
            
            $lang = $this->getLang();
       
        
            $data = new stdClass();
        
        
            $data = ServiceTab::select(['id', 'name_'. $lang .' as name', 'desc_'. $lang .' as description',
             'service_id']);
            if($request->has('ser')){
        
            $data = $data->where('service_id' ,$request->ser)   ;
        
        }

          return response()->json( $data->get());
            
            
            
    
    
            // $request = ServiceTab::all();
    
            // return response()->json($request);
    
    
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
    
        public function getServiceTabsID($id)
        {
    
    
            $request = ServiceTab::find($id);

            return response()->json($request);
            

    
    
        }

        public function getSingleServiceTabs($id)
        {
    
            

            $data = ServiceTab::where('service_id' ,FacadesRoute::input('id'))->orderBy('id' ,'desc')->get();
            return response()->json($data);

    
    
        }


}
