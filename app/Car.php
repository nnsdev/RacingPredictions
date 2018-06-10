<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = ['id'];

    public function predictions()
    {
        return $this->hasMany(Prediction::class);
    }
}
