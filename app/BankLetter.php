<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BankLetter extends Model
{
    use LogsActivity;
    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }
}
