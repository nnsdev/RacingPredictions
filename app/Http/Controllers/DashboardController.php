<?php

namespace App\Http\Controllers;

use App\Car;
use App\Prediction;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'latest' => Prediction::latest()->take(5)->get(),
            'most_picked' => [
                'lmp1' => Prediction::select('lmp1_id')->groupBy('lmp1_id')->orderByRaw('COUNT(lmp1_id) DESC')->first()->lmp1,
                'lmp2' => Prediction::select('lmp2_id')->groupBy('lmp2_id')->orderByRaw('COUNT(lmp2_id) DESC')->first()->lmp2,
                'gtepro' => Prediction::select('gtepro_id')->groupBy('gtepro_id')->orderByRaw('COUNT(gtepro_id) DESC')->first()->gtepro,
                'gteam' => Prediction::select('gteam_id')->groupBy('gteam_id')->orderByRaw('COUNT(gteam_id) DESC')->first()->gteam,
            ],
        ]);
    }

    public function bet(Request $request)
    {
        $request->validate([
            'lmp1' => 'required',
            'lmp2' => 'required',
            'gtepro' => 'required',
            'gteam' => 'required',
        ]);

        $lmp1 = Car::where(['class' => 'lmp1', 'id' => $request->get('lmp1')])->firstOrFail();
        $lmp2 = Car::where(['class' => 'lmp2', 'id' => $request->get('lmp2')])->firstOrFail();
        $gtepro = Car::where(['class' => 'gtepro', 'id' => $request->get('gtepro')])->firstOrFail();
        $gteam = Car::where(['class' => 'gteam', 'id' => $request->get('gteam')])->firstOrFail();

        $prediction = Prediction::updateOrCreate(['user_id' => \Auth::user()->id], [
            'lmp1_id' => $lmp1->id,
            'lmp2_id' => $lmp2->id,
            'gtepro_id' => $gtepro->id,
            'gteam_id' => $gteam->id,
        ]);

        return redirect()->back()->with('success', 'Your bets have been updated.');
    }

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
