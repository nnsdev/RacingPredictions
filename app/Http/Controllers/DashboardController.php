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
                'lmp1' => (Prediction::count() > 0) ? Prediction::select('lmp1_id')->groupBy('lmp1_id')->orderByRaw('COUNT(lmp1_id) DESC')->first()->lmp1 : null,
                'lmp2' => (Prediction::count() > 0) ? Prediction::select('lmp2_id')->groupBy('lmp2_id')->orderByRaw('COUNT(lmp2_id) DESC')->first()->lmp2 : null,
                'gtepro' => (Prediction::count() > 0) ? Prediction::select('gtepro_id')->groupBy('gtepro_id')->orderByRaw('COUNT(gtepro_id) DESC')->first()->gtepro : null,
                'gteam' => (Prediction::count() > 0) ? Prediction::select('gteam_id')->groupBy('gteam_id')->orderByRaw('COUNT(gteam_id) DESC')->first()->gteam : null,
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
}
