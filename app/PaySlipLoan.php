<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaySlipLoan extends Model
{
    public function loanname()
    {
        return $this->belongsTo('App\Loan');
    }
}
