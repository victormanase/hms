<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Employee extends Model
{
    use LogsActivity;
    
    public function department()
    {
        # code...
        return $this->belongsTo('App\Department');
    }

    public function nationality()
    {
        return $this->belongsTo('App\Nationality');
    }


    public function company()
    {
        return $this->belongsTo('App\Company');
    }


    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }
    public function designation(){

        return $this->belongsTo('App\Designation');
    }
    public function leftEmployee(){

        return $this->belongsTo('App\LeftEmployee');
    }
    public function leaves(){

        return $this->hasMany('App\Leave');
    }

    public function qualifications()
    {
        return $this->belongsToMany('App\Qualification');
    }
    
    public function workStation()
    {
        return $this->belongsTo('App\WorkStation');
    }

    public function scholarships()
    {
       
        return $this->hasMany('App\Scholarship');
    }

    public function loans()
    {
       
        return $this->hasMany('App\Loan');
    }

    public function socialSecurity()
    {
        return $this->hasOne('App\EmployeeSocialSecurity');
    }

    public function deductions()
    {
        return $this->belongsToMany('App\Deduction');
    }
    public function incomes()
    {
        return $this->belongsToMany('App\Income');
    }
}
