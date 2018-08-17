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
        return $prediction->{$class};
    }
}
