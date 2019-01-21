<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Application extends Model
{
    use LogsActivity;
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function vacancy()
    {
        return $this->belongsTo('App\Vacancy');
    }
}
