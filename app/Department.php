<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Department extends Model



{


    use LogsActivity;


    public function company()
    {
        # code...
        return $this->belongsTo('App\Company');

    }

    public function employees()
    {
        # code...
        return $this->hasMany('App\Employee');
    }

    public function designations()
    {
        return $this->hasMany('App\Designation');
    }
}
