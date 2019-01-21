<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Pten extends Model
{
    use LogsActivity;

    protected $date=['date'];
}
