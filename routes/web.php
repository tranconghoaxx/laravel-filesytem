<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\UploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload-tutorial', [UploadController::class, 'index']);
Route::post('store', [UploadController::class, 'store']);
Route::get('show', [UploadController::class, 'show']);

Route::get('file', [FileController::class, 'showUploadForm'])->name('upload.file');
Route::post('file', [FileController::class, 'storeFile']);
Route::post('file', [FileController::class, 'storeFileMulti'])->name('upload.muti');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// protect file
Route::get('uploadedFile/{filename}', [FileController::class, 'getFile'])->name('get.file')->middleware('auth');
// get upload folder
Route::get('upload-folder', function () {
    return view('upload.uploadfolder');
});
Route::post('upload-folder', [FileController::class, 'uploadFolder'])->name('upload.folder');
// upload file call ajax
Route::get('file-call-ajax', [FileController::class, 'index']);
Route::post('store-file', [FileController::class, 'storeAjaxFile']);

Route::get('/upload-folder-stackover', function () {
    return view('upload.uploadfolderstackover');
});
Route::post('cmd/test', function(Request $request) {

    // dd($request);
    $files = $request->file('content');
    // echo json_encode($files);
    dd($files);
    //Store the files here...
});