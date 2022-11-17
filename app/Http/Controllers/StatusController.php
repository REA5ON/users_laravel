<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StatusController extends Controller
{
    public function show($id)
    {
        $profile = UserProfile::find($id);

        if (Gate::denies('user', $profile)) {
            return redirect()->back();
        }

        return view('status', ['profile' => $profile]);
    }

    public function store(Request $request)
    {
        $profileStatus = UserProfile::find($request->id);
        $profileStatus->status = $request->status;
        $profileStatus->save();

        flash()->success('Статус обновлен!');

        return redirect()->route('users');
    }
}
