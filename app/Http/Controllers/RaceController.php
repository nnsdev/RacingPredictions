<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Race;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    public function getIndex(Race $race)
    {
        if ($race->race_start && $race->race_start->greaterThan(now()->subWeek()) && $race->race_end->greaterThan(now())) {
            return view('race.predict', [
                'race' => $race,
                'latest' => $race->getLatestPredictions()->take(5)->get(),
                'most_picked' => $race->getMostPicked(),
                'leaderboard' => $race->getLeaderboard()->take(10)->get(),
            ]);
        }
        return redirect('/dashboard');
    }

    public function getResults(Race $race)
    {
        if ($race->race_start->greaterThan(now())) {
            return redirect('/dashboard');
        }
        return view('race.results', [
            'race' => $race,
            'you' => collect($race->predictions()->orderBy('points', 'DESC')->get())->search(function ($prediction) {
                return $prediction->user_id == \Auth::user()->id;
            }) + 1,
            'users' => $race->getLeaderboard()->paginate(50),
        ]);
    }

    public function postIndex(Race $race, Request $request)
    {
        if (now()->lessThan($race->race_start)) {
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

            $prediction = $race->predictions()->updateOrCreate(['user_id' => \Auth::user()->id], [
                'lmp1_id' => $lmp1->id,
                'lmp2_id' => $lmp2->id,
                'gtepro_id' => $gtepro->id,
                'gteam_id' => $gteam->id,
            ]);

            return back()->with('success', 'Your bets have been updated.');
        }
        return back();
    }

    public function getPredictions(Race $race)
    {
        return view('race.predictions', [
            'race' => $race,
            'users' => $race->getLatestPredictions()->paginate(50),
        ]);
    }
}
