<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SecurityController extends Controller
{

    function show($id)
    {
        $profile = UserProfile::find($id);

        if (Gate::denies('user', $profile)) {
            return redirect()->back();
        }

        return view('security', ['profile' => $profile]);
    }


    function store(Request $request)
    {

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $profile = UserProfile::find($request->id);


        //if email will be change
        if ($request->email !== $profile->email) {
            $request->validate([
                'email' => ['unique:users']
            ]);

            $userSave = User::find($profile->id);
            $userSave->email = $request->email;
            $userSave->save();

            $profileSave = UserProfile::find($profile->id);
            $profileSave->email = $request->email;
            $profileSave->save();

            flash()->success('Email успешно изменён!');
        };

        //new password save
        $passSave = User::find($profile->id);
        $passSave->password = Hash::make($request->password);
        $passSave->save();

        flash()->success('Пароль успешно изменён!');
        return redirect()->route('users');

    }
}
