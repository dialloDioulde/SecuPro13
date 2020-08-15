<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    // Un Site appartient à un seul et unique Client
    public function locationOwner()
    {
        return $this->belongsTo('App\Client','l_client_id');

    }

    // Un site peut avoir 0 ou plusieurs Planning
    public function locationPlanning(){

        return $this->hasMany('App\Planning');
    }


}
