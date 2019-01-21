<?php

namespace App;

use Laratrust\Models\LaratrustRole;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends LaratrustRole
{
    use LogsActivity;
}
