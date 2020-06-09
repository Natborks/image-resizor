<?php
  
  public function resizer (Request $request){
    
    $validatedData = $request->validate([
      ‘image’ => ‘bail|required|mimes:jpeg, bmp, png|size:5000|
       dimensions:min_width=100, max_width=3000, max_height=2000 min_height=100’,

      ‘resize’ => ‘required’
      ])
  }

?>
