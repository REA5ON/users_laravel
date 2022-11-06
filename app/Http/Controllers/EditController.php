<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class EditController extends Controller
{


    public function show($id)
    {
        $profile = UserProfile::find($id);

        if (Gate::denies('user', $profile)) {
            return redirect()->back();
        }

        return view('edit', ['profile' => $profile]);
    }

    public function store(Request $request)
    {
        $profile = UserProfile::find($request->id);

        if (Gate::denies('user', $profile)) {
            return redirect()->back();
        }


        $user = User::find($request->id);
        $user->name = $request->name;
        $user->save();


        $profile->name = $request->name;
        $profile->job = $request->job;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->save();


        flash()->success('Данные успешно изменены!');
        return redirect()->route('users');
    }
}
