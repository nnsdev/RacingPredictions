<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function predictions()
    {
        return $this->hasMany(Prediction::class);
    }

    public function getPrediction(Race $race, $class)
    {
        $prediction = $this->predictions()->where('race_id', $race->id)->first();
        if(!$prediction) {
            return 0;
        }
        return $prediction->{$class}->id;
    }

    public static function calculatePoints()
    {
        collect(self::all())->map(function ($user) {
            return ['user' => $user, 'points' => collect($user->predictions()->where('race_id', '<', getenv('RACE_ID'))->get())->map(function ($prediction) {
                return $prediction->points;
            })->sum()];
        })->each(function ($user) {
            $user['user']->update(['points' => $user['points']]);
        });
    }
}
