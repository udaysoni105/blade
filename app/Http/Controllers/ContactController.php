<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**@ author :#### ####
 * class name : ContactController
 * create a new controller for doing operation on Contact module.
 **/
class ContactController extends Controller
{
    /**
     * @ author :#### ####
     * method name upload
     * upload items store in upload items store 
     */
    public function upload(Request $request){
        $fileName = time() . "-ws." . $request->file('image')->getClientOriginalExtension();
        // echo $fileName;
        // die;
        echo $request->file('image')->storeAs('uploads',$fileName);
    }
}
