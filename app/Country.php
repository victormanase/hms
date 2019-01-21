<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Country extends Model
{
    use LogsActivity;
    public function scholarships()
    {
        # code...
        return $this->hasMany('App\Scholarship');
    }
}
