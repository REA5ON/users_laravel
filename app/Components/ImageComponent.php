<?php

namespace App\Components;

use App\Models\UserProfile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class ImageComponent
{
    /**
     * Store image.
     *
     * @param UploadedFile $uploadedFile
     * @param null $profile
     * @return string $imageName
     */
    public function storeImage(UploadedFile $uploadedFile, UserProfile $profile = null)
    {
        $this->deleteImage($profile);

        //new name
        $imageName = $uploadedFile->hashName();

        //save in storage
        $path = 'img/users/';
        $uploadedFile->move(public_path($path), $imageName);

        //save to db
        $profile->image = $path . $imageName;
        $profile->save();
    }

    public function deleteImage($profile)
    {
        //delete exist image
        if ($profile->image !== null) {
            File::delete($profile->image);
        }
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
        return $image == null
                ? $emptyImageName
                : $image;
    }
}
