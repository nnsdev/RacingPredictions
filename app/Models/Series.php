<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $guarded = ['id'];

    public function races()
    {
        return $this->hasMany(Race::class);
    }
}
