<?php

use App\Models\Race;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/standings/{race}', function (Race $race, Request $request) {
        $prediction = $race->predictions()->where('user_id', $request->user()->id)->first();
        return response([
            'standings' => [
                'dpi' => ['team' => $prediction->dpi->getInfo(), 'pivot' => $race->cars()->where('car_id', $prediction->dpi_id)->first()->pivot],
                'lmp2' => ['team' => $prediction->lmp2->getInfo(), 'pivot' => $race->cars()->where('car_id', $prediction->lmp2_id)->first()->pivot],
                'gtlm' => ['team' => $prediction->gtlm->getInfo(), 'pivot' => $race->cars()->where('car_id', $prediction->gtlm_id)->first()->pivot],
                'gtd' => ['team' => $prediction->gtd->getInfo(), 'pivot' => $race->cars()->where('car_id', $prediction->gtd_id)->first()->pivot],
            ],
            'remaining' => gmdate('H:i:s', $race->race_end->diffInSeconds(now())),
            'state' => $race->state,
            'last_update' => now()->format("H:i:s"),
            'points' => $prediction->points,
        ]);
    });
    Route::get('/leaderboard/{race}', function (Race $race, Request $request) {
        return response($race->predictions()->orderBy('points', 'DESC')->with('user')->take(10)->get());
    });
});
