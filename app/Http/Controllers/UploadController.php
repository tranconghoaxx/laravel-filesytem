<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload.upload');
    }
    public function store(Request $request)
    {
        //$request->file('image');
        if ($request->hasFile('image')) {
            // return $request->image->store('public/luufile');
            // cach 2

            // public mean: in storage app public will -> storage:link to public project
            // day la upload voi random name
            // return Storage::putFile('public/new',$request->file('image'));

            // chi dinh name upload luon
            return $request->image->storeAs('public/luufile', 'tranconghoa.jpg');
        } else {
            return 'No file selected!';
        }
    }
    public function show()
    {
        //Storage::allFiles(''); get subfoder luon
        // return Storage::files('public');

        // tao folder
        // return Storage::makeDirectory('public/make');

        // delete folder
        // return Storage::deleteDirectory('public/make');

        $url = Storage::url('public/luufile/tranconghoa.jpg');
        //    return "<img src='$url' alt='Girl in a jacket' width='500' height='600'/>";

        // return size
        // return Storage::size('public/luufile/tranconghoa.jpg');

        // di chuyen file (file goc -> thu muc chuyen den)
        // return Storage::move('public/luufile/tranconghoa.jpg','public/new/tranconghoa.jpg');

        // get raw data image
        $rawContent = Storage::get('public/new/tranconghoa.jpg');
        // return Storage::put('public/newImage.jpg', $rawContent);

        // delete file
        Storage::delete('public/newImage.jpg');
    }
}
