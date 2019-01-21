<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class LeaveType extends Model
{
    use LogsActivity;
    public function company()
    {
        # code...
        return $this->belongsTo('App\Company');

    }
}
