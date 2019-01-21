<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class LeftEmployee extends Model
{
    public function employee()
    {
        return $this->hasOne('App\Employee');
    }
}
