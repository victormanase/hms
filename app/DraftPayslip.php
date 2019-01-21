<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DraftPayslip extends Model
{
    public function incomes()
    {
        return $this->hasMany('App\DraftIncome');
    }

    public function deductions()
    {
        return  $this->hasMany('App\DraftDeduction');
    }
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
