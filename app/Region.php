<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Region extends Model
{
    use LogsActivity;
    
    public function county()
    {
        return belongsTo('App\Country');
    }

    public function companies()
    {
        return belongsTo('App\Company');
    }

    public function districts()
    {
        return $this->hasMany('App\Districts');
    }
}
