<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Store image.
     *
     * @param UploadedFile $uploadedFile
     *
     * @return string $imageName
     */
    public static function storeImage(UploadedFile $uploadedFile)
    {
        //new name
        $imageName = $uploadedFile->hashName();

        //save
        $uploadedFile->move(public_path('img/users'), $imageName);

        //return new name
        return $imageName;
    }

    /**
     * Check exist image.
     *
     * @param $image string
     * @return string
     */
    public static function emptyImage($image)
    {
        $emptyImageName = 'empty.png';
        if ($image === null) {
            return $emptyImageName;
        } else {
            return $image;
        }
    }
}
