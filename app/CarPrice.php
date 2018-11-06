<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarPrice extends Model
{
    public function car()
    {
        return $this->belongsTo('App\CarPrice');
    }
}
