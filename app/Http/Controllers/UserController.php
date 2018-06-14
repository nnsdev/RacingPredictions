<?php

namespace App\Http\Controllers;

use App\Prediction;
use App\User;
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

    public function user(User $user)
    {
        return view('user', ['user' => $user]);
    }

    public function leaderboard()
    {
        $users = User::orderBy('points')->join('predictions', 'predictions.user_id', '=', 'users.id')->orderBy('predictions.id');
        return view('leaderboard', [
            'users' => $users->paginate(100),
            'you' => collect($users->get())->search(function ($user) {
                return $user->id == \Auth::user()->id;
            }) + 1,
        ]);
    }

    public function predictions()
    {
        return view('predictions', [
            'predictions' => Prediction::latest()->paginate(100),
        ]);
    }
}
