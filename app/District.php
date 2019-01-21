<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class District extends Model
{
    use LogsActivity;
    
     public function company()
    {
        return belongsTo('App\Company');
    }
    public function region()
    {
        return belongsTo('App\Region');
    }
}
