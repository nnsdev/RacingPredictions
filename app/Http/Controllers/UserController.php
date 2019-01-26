<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function postSearch(Request $request)
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
        $users = User::orderBy('points', 'DESC');
        return view('leaderboard', [
            'users' => $users->paginate(100),
            'you' => collect($users->get())->search(function ($user) {
                return $user->id == \Auth::user()->id;
            }) + 1,
        ]);
    }
}
