<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('okta')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(\Illuminate\Http\Request $request)
    {
        $user = Socialite::driver('okta')->user();

        $email = $user->email;
        $token = $user->token;

        $localUser = User::where('email', $email)->first();

        // create a local user with the email and token from Okta
        if (! $localUser) {
            $localUser = User::create([  
                'email' => $email,
                'token' => $token,
            ]);
        } else {

            // if the user already exists, just update the token:
            $localUser->token = $token;
            $localUser->save();
        }

        Auth::login($localUser);

        return redirect('/home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}