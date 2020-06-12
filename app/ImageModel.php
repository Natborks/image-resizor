<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class ImageModel extends Model
{
    //
    public function resize($image, $height, $width) {

        $filename = $image->getClientOriginalName();

        $image->move(public_path('thumbnail/'), $filename);

        $image_resize = Image::make(public_path('thumbnail/' . $filename));
        $image_resize->fit($height, $width);
        //$path = public_path('thumbnail/') .$filename;
        $image_resize->save(public_path('thumbnail/') .$filename);

        return $filename;
    }
}
