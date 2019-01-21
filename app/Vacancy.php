<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Vacancy extends Model
{
    use LogsActivity;
    
public function company()
{
    # code...
    return $this->belondsTo('App\Company');
}
}
