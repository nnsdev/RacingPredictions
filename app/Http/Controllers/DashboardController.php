<?php

namespace App\Http\Controllers;

use App\User;
use App\Prediction;
use App\Models\Race;
use App\Models\Series;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard', [
            'upcoming' => Race::where('starts_at', '>', now())->orderBy('starts_at', 'ASC')->take(5)->get(),
            'series' => Series::with('races')->get(),
        ]);
    }
    public function race()
    {
        return view('dashboard', [
            'latest' => Prediction::latest()->take(5)->get(),
            'most_picked' => [
                'lmp1' => (Prediction::count() > 0) ? Prediction::select('lmp1_id')->groupBy('lmp1_id')->orderByRaw('COUNT(lmp1_id) DESC')->first()->lmp1 : null,
                'lmp2' => (Prediction::count() > 0) ? Prediction::select('lmp2_id')->groupBy('lmp2_id')->orderByRaw('COUNT(lmp2_id) DESC')->first()->lmp2 : null,
                'gtepro' => (Prediction::count() > 0) ? Prediction::select('gtepro_id')->groupBy('gtepro_id')->orderByRaw('COUNT(gtepro_id) DESC')->first()->gtepro : null,
                'gteam' => (Prediction::count() > 0) ? Prediction::select('gteam_id')->groupBy('gteam_id')->orderByRaw('COUNT(gteam_id) DESC')->first()->gteam : null,
            ],
            'leaderboard' => User::orderBy('points', 'DESC')->take(10)->get(),
        ]);
    }
}
