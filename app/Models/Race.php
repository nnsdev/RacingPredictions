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
        if ($value == 'red') {
            $this->attributes['state'] = "Red Flag";
        } elseif ($value == 'green') {
            $this->attributes['state'] = "Green Flag";
        } elseif ($value == 'safety_car') {
            $this->attributes['state'] = "Safety Car";
        } else {
            $this->attributes['state'] = "Checkered Flag";
        }
    }

    public function getMostPicked()
    {
        if (Prediction::where('race_id', $this->id)->count() > 0) {
            return [
                'dpi' => Prediction::where('race_id', $this->id)->select('dpi_id')->groupBy('dpi_id')->orderByRaw('COUNT(dpi_id) DESC')->first()->dpi,
                'lmp2' => Prediction::where('race_id', $this->id)->select('lmp2_id')->groupBy('lmp2_id')->orderByRaw('COUNT(lmp2_id) DESC')->first()->lmp2,
                'gtlm' => Prediction::where('race_id', $this->id)->select('gtlm_id')->groupBy('gtlm_id')->orderByRaw('COUNT(gtlm_id) DESC')->first()->gtlm,
                'gtd' => Prediction::where('race_id', $this->id)->select('gtd_id')->groupBy('gtd_id')->orderByRaw('COUNT(gtd_id) DESC')->first()->gtd,
            ];
        }
        return ['dpi' => null, 'lmp2' => null, 'gtlm' => null, 'gtd' => null];
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
