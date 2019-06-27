<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Prediction;
use App\User;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard', ['races' => Race::all()]);
    }
    public function race()
    {
        $mostPicked = [
            'dpi' => (Prediction::count() > 0) ? Prediction::select('dpi_id')->groupBy('dpi_id')->orderByRaw('COUNT(dpi_id) DESC')->first()->dpi : null,
            'lmp2' => (Prediction::count() > 0) ? Prediction::select('lmp2_id')->groupBy('lmp2_id')->orderByRaw('COUNT(lmp2_id) DESC')->first()->lmp2 : null,
            'gtlm' => (Prediction::count() > 0) ? Prediction::select('gtlm_id')->groupBy('gtlm_id')->orderByRaw('COUNT(gtlm_id) DESC')->first()->gtlm : null,
            'gtd' => (Prediction::count() > 0) ? Prediction::select('gtd_id')->groupBy('gtd_id')->orderByRaw('COUNT(gtd_id) DESC')->first()->gtd : null,
        ];
        return view('dashboard', [
            'latest' => Prediction::latest()->take(5)->get(),
            'most_picked' => $mostPicked,
            'leaderboard' => User::orderBy('points', 'DESC')->take(10)->get(),
        ]);
    }
}
