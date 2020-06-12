<?php

namespace App\Http\Controllers;

class MainController extends ImageController 
{
    public function documentation()
    {
        $file = file_get_contents('../public/swagger/openapi.json');
        $jsonData = json_decode($file, true);
        return response()->json($jsonData);
    }
}