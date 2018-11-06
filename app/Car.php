<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function carprice()
    {
        return $this->hasMany('App\CarPrice');
    }
}
