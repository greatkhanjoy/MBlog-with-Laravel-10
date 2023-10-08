<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait ImageUploadTrait
{

    public function uploadImage(Request $request, $inputName, $path)
    {
        if ($request->hasFile($inputName)) {
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '_.' . $ext;
            $image->move(public_path($path), $imageName);
            return $path . '/' . $imageName;
        } else {
            return '';
        }
    }

    public function updateImage(Request $request, $inputName, $path, $oldImage)
    {

        if ($request->hasFile($inputName)) {
            // delete old profile image 
            if (File::exists(public_path($oldImage))) {
                File::delete(public_path($oldImage));
            }

            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '_.' . $ext;
            $image->move(public_path($path), $imageName);
            return $path . '/' . $imageName;
        } else {
            return $oldImage;
        }
    }
}
