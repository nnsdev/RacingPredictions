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
            $prediction->user()->increment('points');
            $prediction->update(['lmp1_correct' => true]);
        });
        $lmp2 = Car::where(['class' => 'lmp2', 'position' => 1])->first();
        collect(self::where('lmp2_id', $lmp2->id)->get())->each(function ($prediction) {
            $prediction->user()->increment('points');
            $prediction->update(['lmp2_correct' => true]);
        });
        $gtepro = Car::where(['class' => 'gtepro', 'position' => 1])->first();
        collect(self::where('gtepro_id', $gtepro->id)->get())->each(function ($prediction) {
            $prediction->user()->increment('points');
            $prediction->update(['gtepro_correct' => true]);
        });
        $gteam = Car::where(['class' => 'gteam', 'position' => 1])->first();
        collect(self::where('gteam_id', $gteam->id)->get())->each(function ($prediction) {
            $prediction->user()->increment('points');
            $prediction->update(['gteam_correct' => true]);
        });

    }
}
