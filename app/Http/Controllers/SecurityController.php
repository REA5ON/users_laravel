<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Requests\SecurityRequest;
use App\Mail\MyTestMail;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class SecurityController extends Controller
{
    protected UserProfile $profile;


    public function __construct(UserProfile $userProfile)
    {
        $this->profile = $userProfile;
    }


    function show($id)
    {
        $profile = $this->profile->find($id);

        if (Gate::denies('user', $profile)) {
            return redirect()->back();
        }

        return view('security', ['profile' => $profile]);
    }


    function store(Request $request, PasswordResetLinkController $pass)
    {

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = UserProfile::find($request->id);

        //if email will be change
        if ($request->email !== $user->email) {
            $request->validate(
                [
                    'email' => ['unique:users'],
                ]);

//            Mail::to('mailtrap@test.com')->send(new MyTestMail());
            dd("Email changed");

            $user_save = User::find($user->id);
            $user_save->email = $request->email;
            $user_save->save();

            $user_save = UserProfile::find($user->id);
            $user_save->email = $request->email;
            $user_save->save();

        };

        dd("Email not changed");

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);



        //Check admin or author: Gate::
        //if email was changed
        //validation
//        if ($request->email === )


        //sending link to email
        // $email->store($request)


    }
}
