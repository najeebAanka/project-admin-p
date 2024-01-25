<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContactsController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',
       
    ]);

    $data = Contact::find($request->id);
        $data->delete();
    return back()->with('msg'  ,'Deleted succesfully');


}

function addItem (Request $request)
{
        

    $request->validate([

        'name' => 'required',
        'phone' => 'required',
        'service_id' => 'required',
        'message' => 'required',
        
    ]);

        $data = new Contact();

        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->service_id = $request->service_id;
        $data->message = $request->message;
    
    $data->save();
    return response()->json('Sent successfully!', 200);

         // return back()->with('msg'  ,'Added succesfully');

         // $request = ProjectCategory::all();
    
         //   return response()->json($request);

}



public function getContacts()
{


    $request = Contact::all();

    return response()->json($request);


}

public function getContactsID($id)
{


    $request = Contact::find($id);

    return response()->json($request);


}


}
