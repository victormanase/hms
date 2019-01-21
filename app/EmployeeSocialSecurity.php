<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSocialSecurity extends Model
{

    protected $table='employee_social_securities';
    
    public function employee(){

        return $this->belongsTo('App\Employee');
    }

    public function ssf(){

        return $this->belongsTo('App\SocialSecurity');
    }
}
