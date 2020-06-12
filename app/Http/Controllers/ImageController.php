<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\ImageModel;

class ImageController extends Controller
{
    //
    /* public function __construct()
    {
        $this->middleware('auth:sanctum');
    } */

    public function resize(ImageRequest $request)
    {
        $validatedData = $request->validated();

        $file =  $validatedData['image'];
        $width = $validatedData['width'];
        $height = $validatedData['height'];

        $image = new ImageModel();

        $filename = $image->resize($file, $height, $width);

        $path = public_path('thumbnail/').$filename;

        if(file_exists($path))
            return response()->json([
                'path'  => env('APP_URL', 'http://localhost:8000') . '/api/download/' . $filename
            ], 200);
        else {
            return response()->json([
                'message'  => 'file not found'
            ], 500);
        }
    }


    public function download($filename)
    {
        $path = public_path('thumbnail/') . $filename;

        if(is_file($path))
            return response()->download($path)->deleteFileAfterSend();
        else{
            return response()->json([
                'error'  => 'file not found'
            ], 500);
        }

    }
}
