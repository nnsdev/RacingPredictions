<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public static function awardPoints()
    {
        $lmp1 = Car::where(['class' => 'lmp1', 'position' => 1])->first();
        collect(self::where('lmp1_id', $lmp1->id)->get())->each(function ($prediction) {
            $prediction->update(['lmp1_correct' => true]);
        });
        $lmp2 = Car::where(['class' => 'lmp2', 'position' => 1])->first();
        collect(self::where('lmp2_id', $lmp2->id)->get())->each(function ($prediction) {
            $prediction->update(['lmp2_correct' => true]);
        });
        $gtepro = Car::where(['class' => 'gtepro', 'position' => 1])->first();
        collect(self::where('gtepro_id', $gtepro->id)->get())->each(function ($prediction) {
            $prediction->update(['gtepro_correct' => true]);
        });
        $gteam = Car::where(['class' => 'gteam', 'position' => 1])->first();
        collect(self::where('gteam_id', $gteam->id)->get())->each(function ($prediction) {
            $prediction->update(['gteam_correct' => true]);
        });
        collect(self::all())->each(function ($prediction) {
            $prediction->user()->increment('points', self::pointAmount($prediction->lmp1->position));
            $prediction->user()->increment('points', self::pointAmount($prediction->lmp2->position));
            $prediction->user()->increment('points', self::pointAmount($prediction->gtepro->position));
            $prediction->user()->increment('points', self::pointAmount($prediction->gteam->position));
        });
    }

    public static function pointAmount($num)
    {
        switch ($num) {
            case "1":return 100;
            case "2":return 80;
            case "3":return 60;
            case "4":return 40;
            case "5":return 20;
            case "6":return 10;
            case "7":return 7;
            case "8":return 5;
            case "9":return 3;
            case "10":return 1;
            default:return 0;
        }
    }
}
