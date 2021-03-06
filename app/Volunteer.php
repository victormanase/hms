<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Volunteer extends Model
{
    use LogsActivity;
    public function company()
    {
       return $this->belongsTo('App\Company');
    }

    public function department()
    {
       return $this->belongsTo('App\Department');
    }
}
