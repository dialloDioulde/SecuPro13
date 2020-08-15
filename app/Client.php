<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $guarded = [];

    // Un client peut avoir un ou plusieurs Site(s)
    public function clientLocation(){

        return $this->hasMany('App\Location');
    }

}

