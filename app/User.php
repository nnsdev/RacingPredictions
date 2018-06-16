<?php

namespace App;

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

    public function prediction()
    {
        return $this->hasOne(Prediction::class);
    }

    public function betOn(Car $car)
    {
        return ($this->prediction && ($this->prediction->lmp1_id == $car->id || $this->prediction->lmp2_id == $car->id || $this->prediction->gtepro_id == $car->id || $this->prediction->gteam_id == $car->id));
    }
}
