<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::view('/', 'welcome')->middleware('guest');
Route::get('/auth', 'AuthController@auth')->middleware('guest')->name('login');
Route::get('/callback', 'AuthController@callback')->middleware('guest');

Route::view('/privacy', 'privacy');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::group(['prefix' => 'race'], function () {
        Route::get('/{race}', 'RaceController@getIndex')->middleware('race');
        Route::post('/{race}', 'RaceController@postIndex')->middleware('race');
        Route::get('/{race}/results', 'RaceController@getResults');
        Route::get('/{race}/predictions', 'RaceController@getPredictions');
    });
    Route::post('/user/search', 'UserController@postSearch');
    Route::get('/user/{user}', 'UserController@getUser');
    Route::get('/leaderboard', 'UserController@getLeaderboard');
    Route::get('/logout', function () {
        \Auth::logout();
        return redirect('/');
    });
});
