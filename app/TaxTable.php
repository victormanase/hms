<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TaxTable extends Model
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
 


}
