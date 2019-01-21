<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Leave extends Model
{

    use LogsActivity;

    protected $dates =['start_date','end_date'];
    
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function company()
    {
        # code...
        return $this->belongsTo('App\Company');

    }

    public function leaveType()
    {
        # code...
        return $this->belongsTo('App\LeaveType');

    }


}
