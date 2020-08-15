<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $guarded = [];

    // Un employé peut avoir 0 ou plusieurs Planning
    public function employeePlanning(){

        return $this->hasMany('App\Planning');
    }


}
