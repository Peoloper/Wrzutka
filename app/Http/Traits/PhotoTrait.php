<?php

namespace App\Http\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait PhotoTrait
{

    public function uploadImage($image, $folder)
    {
        $extension = $image->getClientOriginalExtension();
        $originalName = $image->getClientOriginalName();
        $originalName = sha1($originalName . time());
        $date = Carbon::now()->format('Y-m-d');
        $fileName = $date . '_' . uniqid() . '_' . $originalName . '.' . $extension;

        $image_resize = Image::make($image->getRealPath());

        $image_resize->save(public_path('images/'.$folder .'/'.$fileName));

        $path = $folder.'/'.$fileName;

        return $path;
    }


    public function deleteImage($model, $folder)
    {
        $file_name = basename($model->photos->path);
        $path = public_path().'/images/'.$folder.'/'.$file_name;
        File::delete($path);
    }
}
