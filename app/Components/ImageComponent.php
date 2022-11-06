<?php

namespace App\Components;

use Illuminate\Http\UploadedFile;

class ImageComponent
{
    /**
     * Store image.
     *
     * @param UploadedFile $uploadedFile
     * @param null $profile
     * @return string $imageName
     */
    public function storeImage(UploadedFile $uploadedFile, $profile = null)
    {
        //delete exist image
        if ($profile->image !== null) {
            \Illuminate\Support\Facades\File::delete($profile->image);
        }

        //new name
        $imageName = $uploadedFile->hashName();

        //save in storage
        $path = 'img/users/';
        $uploadedFile->move(public_path($path), $imageName);

        //save to db
        $profile->image = $path . $imageName;
        $profile->save();
    }

    /**
     * Check exist image.
     *
     * @param $image string
     * @return string
     */
    public static function emptyImage($image)
    {
        $emptyImageName = 'https://cdn-icons-png.flaticon.com/512/992/992490.png';
        if ($image === null) {
            return $emptyImageName;
        } else {
            return $image;
        }
    }
}
