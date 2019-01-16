<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function lmp1()
    {
        return $this->belongsTo(Car::class);
    }

    public function lmp2()
    {
        return $this->belongsTo(Car::class);
    }

    public function gtepro()
    {
        return $this->belongsTo(Car::class);
    }

    public function gteam()
    {
        return $this->belongsTo(Car::class);
    }

    public static function getFinishingPositions(Race $race, User $user)
    {
        $prediction = self::where(['user_id' => $user->id, 'race_id' => $race->id])->first();
        if(!$prediction) {
            return null;
        }
        return [
            'lmp1' => $race->cars()->where('car_id', $prediction->dpi_id)->firstOrFail()->pivot->position,
            'lmp2' => $race->cars()->where('car_id', $prediction->lmp2_id)->firstOrFail()->pivot->position,
            'gtepro' => $race->cars()->where('car_id', $prediction->gtlm_id)->firstOrFail()->pivot->position,
            'gteam' => $race->cars()->where('car_id', $prediction->gtd_id)->firstOrFail()->pivot->position,
            'points' => $prediction->points,
        ];
    }

    public static function awardPoints(Race $race)
    {
        collect(self::where('race_id', $race->id)->get())->each(function ($prediction) use ($race) {
            $points = self::pointAmount($race->cars()->where('car_id', $prediction->dpi_id)->firstOrFail()->pivot->position);
            $points += self::pointAmount($race->cars()->where('car_id', $prediction->lmp2_id)->firstOrFail()->pivot->position);
            $points += self::pointAmount($race->cars()->where('car_id', $prediction->gtlm_id)->firstOrFail()->pivot->position);
            $points += self::pointAmount($race->cars()->where('car_id', $prediction->gtd_id)->firstOrFail()->pivot->position);
            $prediction->update(['points' => $points]);
        });
    }

    public static function pointAmount($num)
    {
        switch ($num) {
            case 1: return 100;
            case 2: return 80;
            case 3: return 60;
            case 4: return 40;
            case 5: return 20;
            case 6: return 10;
            case 7: return 7;
            case 8: return 5;
            case 9: return 3;
            case 10: return 1;
            default: return 0;
        }
    }
}
