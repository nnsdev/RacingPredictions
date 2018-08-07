<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $request->validate(['search' => 'required']);

        $user = User::whereName($request->get('search'))->first();

        if ($user) {
            return redirect('/user/' . $user->id);
        }
        return redirect()->back()->with('error', 'User not found.');
    }

    public function getUser(User $user)
    {
        return view('user', [
            'user' => $user,
            'predictions' => $user->predictions,
        ]);
    }

    public function getLeaderboard()
    {
        return view('leaderboard', [
            'users' => Users::orderBy('points')->paginate(100),
            'you' => collect($users)->search(function ($user) {
                return $user->id == \Auth::user()->id;
            }) + 1,
        ]);
    }
}
