<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload-tutorial', [UploadController::class,'index']);
Route::post('store', [UploadController::class,'store']);
Route::get('show',[UploadController::class,'show']);

Route::get('file',[FileController::class,'showUploadForm'])->name('upload.file');
Route::post('file',[FileController::class,'storeFile']);
Route::post('file',[FileController::class,'storeFileMulti'])->name('upload.muti');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// protect file
Route::get('uploadedFile/{filename}',[FileController::class,'getFile'])->name('get.file')->middleware('auth');
