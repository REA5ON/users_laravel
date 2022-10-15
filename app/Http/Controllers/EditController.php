<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Display the edit view.
     *
     * @return \Illuminate\View\View
     */
    function show(UserProfile $userProfile, $id)
    {
        $user = $userProfile::where('id', $id)->first();

        return view('edit', ['user' => $user]);
    }
}
