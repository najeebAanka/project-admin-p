<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    public function getLang(){
        
      $lang = "en";
        
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            
           $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
           $langs = array(
                          "en",
                          "ar"
                         );
        
           if (!in_array($lang, $langs))
           $lang = 'en';
        }
        
        //$temp = $request->header('accessing_from');  
      
      return $lang;
        
    }
    
    
}
