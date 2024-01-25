<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LangMid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
    
        //  if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        //  $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        //  $langs = array(
        //  "en",
        //  "ar"
        //  );
        
        //  if (!in_array($lang, $langs))
        //  $lang = 'en';
        //  return 'Language is not supported';
        //  }else
        //  return 'No language selected';
        
        
        return $next($request);
    }
}
