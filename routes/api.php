<?php

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

Route::middleware('auth:api')->get('/standings', function (Request $request) {
    return response([
        'cars' => $request->user()->prediction()->with('lmp1')->with('lmp2')->with('gtepro')->with('gteam')->first(),
        'points' => $request->user()->calculatePoints(),
    ]);
});
