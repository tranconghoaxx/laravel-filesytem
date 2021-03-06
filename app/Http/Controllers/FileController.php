<?php

namespace App\Http\Controllers;

use App\Models\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function showUploadForm()
    {
        return view('upload.uploadfiledb');
        // return $request->all();
    }
    public function storeFile(Request $request)
    {
        // ten chinh xac hien thi trong db de sau nay show
        if ($request->hasFile('file')) {
            $filename = $request->file->getClientOriginalName();
            $filesize = $request->file->getSize();
            // luu
            // $request->file->store('public/new');

            // tra ve duong dan
            // vua luu server vua tra ve path
            // return $request->file->storeAs('public/new',$filename);

            $request->file->storeAs('public/new', $filename);

            $file = new File();
            $file->name = $filename;
            $file->size = $filesize;
            $file->save();
            return 'yess';
        }
    }


    public function storeFileMulti(Request $request)
    {
        // return $request->all();

        if ($request->hasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $filesize = $file->getSize();
                $request->file->storeAs('public/new', $filename);
                $file = new File();
                $file->name = $filename;
                $file->size = $filesize;
                $file->save();
                print_r($filename);
            }



            return 'yess';
        }
    }
    // protect file
    public function getFile($filename)
    {
        // return $filename;
        try {
            return response()->download(Storage::path('public/new/' . $filename), null, [], null);
        } catch (Exception $e) {
            return 'file not found!';
        }
    }
    public function uploadFolder(Request $request)
    {
        dd($request->file);

        // if ($request->hasFile('file')) {
        //     foreach ($request->file as $file) {
        //         dd($file);
        //     }
        // }
    }
    // ajax call upload
    public function index()
    {
        return view('upload.uploadfilajax');
    }

    public function storeAjaxFile(Request $request)
    {
        return $request->file;
        // request()->validate([
        //     'file'  => 'required|mimes:doc,docx,pdf,txt|max:2048',
        // ]);

        if ($files = $request->file('file')) {

            //store file into document folder
            $file = $request->file->store('public/documents');

            // dd($request->file);

            //store your file into database
            //$document = new Document();
            //$document->title = $file;
            //$document->save();

            return Response()->json([
                "success" => true,
                "file" => $file
            ]);
        }

        return Response()->json([
            "success" => false,
            "file" => ''
        ]);
    }
}
