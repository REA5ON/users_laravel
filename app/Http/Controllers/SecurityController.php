<?php

namespace App\Http\Controllers;

use App\Http\Requests\SecurityRequest;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class SecurityController extends Controller
{
    /**
     * Display the security view.
     *
     * @return \Illuminate\View\View
     */
    function show($id)
    {
        $user = UserProfile::where('id', $id)->first();

        return view('security', ['user' => $user]);
    }

    function store(SecurityRequest $securityRequest, Request $request)
    {
        dd($request);
        $securityRequest->validated();
    }
}
