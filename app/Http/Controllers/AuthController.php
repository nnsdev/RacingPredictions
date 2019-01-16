<?php

namespace App\Http\Controllers;

use App\Models\User;

class AuthController extends Controller
{
    public function auth()
    {
        return \Socialite::with('discord')->redirect();
    }

    public function callback()
    {
        $discord = \Socialite::driver('discord')->stateless()->user();
        $accessTokenResponseBody = $discord->accessTokenResponseBody;
        $user = User::updateOrCreate(['discord_id' => $discord->id], [
            'name' => $discord->nickname,
            'avatar' => $discord->avatar ?? null,
            'refresh_token' => $accessTokenResponseBody['refresh_token'],
            'points' => 0,
        ]);
        \Auth::login($user, true);
        return redirect('/dashboard');
    }
}
