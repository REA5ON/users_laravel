<?php

namespace App\Http\Controllers;

use App\Components\ImageComponent;
use App\Http\Requests\CreateRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CreateController extends Controller
{

    function show(): View
    {
        return view('create_user');
    }


    /**
     * Handle an incoming registration request by an admin.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    function store(CreateRequest $createRequest, Request $request, ImageComponent $imageComponent)
    {
        //Validate
        $createRequest->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $image = $imageComponent->storeImage($request->image);


        UserProfile::create([
            'email' => $request->email,
            'name' => $request->name,
            'job' => $request->job,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $image,
            'vk' => $request->vk,
            'telegram' => $request->telegram,
            'instagram' => $request->instagram,
            'status' => $request->status
        ]);

        event(new Registered($user));

        flash('Новый пользователь успешно создан!')->success();

        return redirect()->route('users');
    }
}
