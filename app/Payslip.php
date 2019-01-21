<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Payslip extends Model
{
    use LogsActivity;

    protected $dates=['date'];

    public function incomes()
    {
        return $this->hasMany('App\PaySlipIncome');
    }

    public function deductions()
    {
        return  $this->hasMany('App\PaySlipDeduction');
    }

    public function loans()
    {
        return  $this->hasMany('App\PaySlipLoan');
    }

    public function ssf()
    {
        return  $this->hasOne('App\PaySlipSsf');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }



    
}
