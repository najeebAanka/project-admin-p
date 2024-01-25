<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route as FacadesRoute;
use stdClass;


class ProjectCategoriesController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',
       
    ]);

    $data = ProjectCategory::find($request->id);
        $data->delete();
    return back()->with('msg'  ,'Deleted succesfully');


}

function addItem (Request $request)
{


    $request->validate([
        
        'name_en' => 'required',
        'name_ar' => 'required',
    ]);

        $data = new ProjectCategory();
    $data->name_en = $request->name_en;
    $data->name_ar = $request->name_ar;
    $data->save();
    return back()->with('msg'  ,'Added succesfully');


}

    function editItem(Request $request)
    {


        $request->validate([
            'id' => 'required',
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);

        $data = ProjectCategory::find($request->id);
        $data->name_en = $request->name_en;
        $data->name_ar = $request->name_ar;
        $data->save();
        return back()->with('msg'  ,'Edited successfully');


    }


        //getProjectCategories
        public function getProjectCategories()
        {
            
            
            
            
            $lang = $this->getLang();
       
        
             $data = new stdClass();
        
        
            $data = ProjectCategory::select(['id', 'name_'. $lang .' as name'])->where('id' ,'>' ,0)->get();
            
    

         return response()->json( $data);
            
            
            
    
    
            // $request = ProjectCategory::all();
    
            // return response()->json($request);
    
    
        }
        
        
        
        
        
        
        
        
        
        
    
        //getProjectCategoriesID
        public function getProjectCategoriesID($id)
        {
    
    
            $request = ProjectCategory::find($id);
    
            return response()->json($request);
    
    
        }


        public function getSingleCategoryProjects($id)
        {
    
            

            $data = Project::where('category_id' ,FacadesRoute::input('id'))->orderBy('id' ,'desc')->get();
            return response()->json($data);

    
    
        }



}
