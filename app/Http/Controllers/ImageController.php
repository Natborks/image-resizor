<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function resize(Request $request){
        
        $validatedData = $request->validate([
            
            ‘image’ => ‘bail|required|mimes:jpeg, bmp, png|size:5000|dimensions:min_width=100, min_height=100, 
            max_height=2000, max_width=3000’,
            
            ‘resize’ => ‘required’])

        return response()->json([
            'message'  => 'resize method hit'
        ], 200);
    }
}
