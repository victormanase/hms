<?php

namespace App;

use Spatie\Activitylog\Traits\LogsActivity;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    use LogsActivity;
    
    public function departments()
    {
        
        return $this->hasMany('App\Department');
    }



    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function banks()
    {
        return $this->hasMany('App\Bank' );
    }


    public function nationalities()
    {
        return $this->hasMany('App\Nationality' );
    }


    public function countries()
    {
        return $this->hasMany('App\Country');
    }



    public function regions()
    {
        return $this->hasMany('App\Region' );
    }

    public function districts()
    {
        return $this->hasMany('App\District' );
    }

    public function designations()
    {
        # code...
        return $this->hasMany('App\Designation');
    }
    public function applications()
    {
        # code...
        return $this->hasMany('App\Application');

    }

    

    public function vacancies()
    {
        # code...
        return $this->hasMany('App\Vacancy');
    }


    public function workStations()
    {
        # code...
        return $this->hasMany('App\WorkStaion');
    }

    public function salaryScales()
    {
        # code...
        return $this->hasMany('App\SalaryScale');
    }

    public function leaveTypes()
    {
        # code...
        return $this->hasMany('App\LeaveType');
    }

    public function leaves()
    {
        # code...
        return $this->hasMany('App\Leave');
    }

    public function qualifications()
    {
        # code...
        return $this->hasMany('App\Qualification');
    }

    public function scholarships()
    {
        # code...
        return $this->hasMany('App\Scholarship');
    }
}
