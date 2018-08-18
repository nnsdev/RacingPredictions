<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $guarded = ['id'];

    public $dates = ['race_start', 'race_end', 'created_at', 'updated_at'];

    public function cars()
    {
        return $this->belongsToMany(Car::class)->withPivot(['position', 'state', 'current_driver', 'gap_to_leader', 'last_lap'])->withTimestamps();
    }

    public function predictions()
    {
        return $this->hasMany(Prediction::class);
    }

    public function setStateAttribute($value)
    {
        if($value == 'red') {
            $this->attributes['state'] = "Red Flag";
        } elseif($value == 'green') {
            $this->attributes['state'] = "Green Flag"; 
        } else {
            $this->attributes['state'] = "Checkered Flag";
        }
    }

    public function getMostPicked()
    {
        if (Prediction::where('race_id', $this->id)->count() > 0) {
            return [
                'lmp1' => Prediction::where('race_id', $this->id)->select('lmp1_id')->groupBy('lmp1_id')->orderByRaw('COUNT(lmp1_id) DESC')->first()->lmp1,
                'lmp2' => Prediction::where('race_id', $this->id)->select('lmp2_id')->groupBy('lmp2_id')->orderByRaw('COUNT(lmp2_id) DESC')->first()->lmp2,
                'gtepro' => Prediction::where('race_id', $this->id)->select('gtepro_id')->groupBy('gtepro_id')->orderByRaw('COUNT(gtepro_id) DESC')->first()->gtepro,
                'gteam' => Prediction::where('race_id', $this->id)->select('gteam_id')->groupBy('gteam_id')->orderByRaw('COUNT(gteam_id) DESC')->first()->gteam,
            ];
        }
        return ['lmp1' => null, 'lmp2' => null, 'gtepro' => null, 'gteam' => null];
    }

    public function getLeaderboard()
    {
        return $this->predictions()->orderBy('points', 'DESC');
    }

    public function getLatestPredictions()
    {
        return $this->predictions()->orderBy('id', 'DESC');
    }

    public function getPredictionOfUser(User $user)
    {
        return $this->predictions()->where('user_id', $user->id)->first();
    }
}
