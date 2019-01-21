<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;


class Loan extends Model
{
    use LogsActivity;

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function company()
    {
        # code...
        return $this->belongsTo('App\Company');

    }

    public function payslip()
    {
        # code...
        return $this->hasMany('App\PaySlipLoan');

    }
}
