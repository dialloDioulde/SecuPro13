<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    //
    protected $guarded =[];

    // Un Planning contient un seul et unique Employé
    public function planningEmployee()
    {
        return $this->belongsTo('App\Employee','p_employee_id');

    }

    // Un Planning contient un seul et unique Site
    public function planningLocation()
    {
        return $this->belongsTo('App\Location','p_location_id');

    }

}
