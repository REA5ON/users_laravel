<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class EditController extends Controller
{

    protected UserProfile $profile;


    public function __construct(UserProfile $userProfile)
    {
        $this->profile = $userProfile;
    }


    public function show($id)
    {
        $profile = $this->profile->find($id);

        if (Gate::denies('user', $profile)) {
            return redirect()->back();
        }

        return view('edit', ['profile' => $profile]);
    }

    public function store(Request $request)
    {
        $profile = $this->profile->find($request->id);

        if (Gate::denies('user', $profile)) {
            return redirect()->back();
        }
        dd(123);
    }
}
