<?php

namespace App\Http\Controllers;

use App\Components\ImageComponent;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function destroy(Request $request, ImageComponent $image)
    {
        $profile = UserProfile::find($request->id);
        $image->deleteImage($profile);
        UserProfile::destroy($request->id);
        User::destroy($request->id);
        return redirect()->route('users');
    }
}
