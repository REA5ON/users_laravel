<?php

namespace App\Http\Controllers;

use App\Components\ImageComponent;
use App\Http\Requests\MediaRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Gate;

class MediaController extends Controller
{
    public function show($id)
    {
        $profile = UserProfile::find($id);

        if (Gate::denies('user', $profile)) {
            return redirect()->back();
        }

        return view('media', ['profile' => $profile]);
    }


    public function store(MediaRequest $request, ImageComponent $imageComponent)
    {
        $profile = UserProfile::find($request->id);

        if (Gate::denies('user', $profile)) {
            return redirect()->back();
        }

        $request->validated();


        try {
            $imageComponent->storeImage($request->image, $profile);
        } catch (\Exception $e){
            return redirect()->back()->withException($e);
        }


        flash()->success('Аватар успешно изменён!');

        return redirect()->route('users');
    }
}
