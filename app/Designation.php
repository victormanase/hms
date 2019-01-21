<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Designation extends Model
{
    // public function employees()
    // {
    //     # code...
    //     return $this->hasMany('App\Employee');
    // }
    use LogsActivity;
    public function company()
    {
        # code...
        return $this->belongsTo('App\Company');
    }
    public function department()
    {
        # code...
        return $this->belongsTo('App\Department');
    }

}
