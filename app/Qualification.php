<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Qualification extends Model
{
    use LogsActivity;
    public function company()
    {
        return $this->belongsTo('App\Company');
        
    }

    public function employees()
    {
        return $this->belongsToMany('App\Employees');
    }
}
