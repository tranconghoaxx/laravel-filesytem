<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(){
        return view('upload.upload');
    }
    public function store(Request $request){
         //$request->file('image');
         if($request->hasFile('image')){
            return $request->image->store('public/luufile');
         }else{
             return 'No file selected!';
         }
      
    }
}
