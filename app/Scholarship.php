<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Scholarship extends Model
{
    use LogsActivity;
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
