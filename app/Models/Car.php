<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = ['id'];

    public function predictions()
    {
        return $this->hasMany(Prediction::class);
    }

    public function races()
    {
        return $this->belongsToMany(Race::class)->withPivot(['position', 'state', 'current_driver', 'gap_to_leader', 'last_lap'])->withTimestamps();
    }

    public function getInfo($drivers = false)
    {
        $info = "#" . $this->car_number . " " . $this->name;
        if ($drivers) {
            $info .= "(";
            foreach (json_decode($this->drivers) as $driver) {
                $info .= $driver . ",";
            }
            $info = rtrim($info, ",") . ")";
        }
        return $info;
    }
}
