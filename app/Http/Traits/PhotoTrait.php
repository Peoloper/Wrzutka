<?php

namespace App\Http\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait PhotoTrait
{

    public function uploadImage($image, $folder)
    {
        $image_parts = explode(";base64,", $image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folder.uniqid() . '.'.$image_type;

        $image_resize = Image::make($image_base64);
        $image_resize->save(public_path('images/'.$folder .'/'.$file));

        $path = $folder.'/'.$file;
        return $path;

    }


    public function deleteImage($model, $folder)
    {
        $file_name = basename($model->photos->path);
        $test = public_path().'/images/'.$folder.'/'.$file_name;
        File::delete($test);
    }
}
