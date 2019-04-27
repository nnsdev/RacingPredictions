<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at', 'starts_at'];

    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}
