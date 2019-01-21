<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Nationality extends Model
{
    
    use LogsActivity;


    public function employees()
    {
        return hasMany('App\Employee');
    }

    public function company()
    {
        return belongsTo('App\Company');
    }
}
