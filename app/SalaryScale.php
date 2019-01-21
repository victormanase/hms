<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SalaryScale extends Model
{
    use LogsActivity;
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
