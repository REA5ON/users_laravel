<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id)
    {
        $profile = UserProfile::find($id);

        return view('page_profile', ['profile' => $profile]);
    }
}
