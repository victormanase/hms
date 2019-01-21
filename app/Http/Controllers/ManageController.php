<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use Auth;
use Session;
use Spatie\Activitylog\Models\Activity;
use Charts;
use App\Role;

class ManageController extends Controller
{





    public function __construct()
    {
        $this->middleware('auth');
    }




    public function checkRole()


    {

//dd(Auth::user()->hasRole('superadministrator'));
        if (!(Auth::user()->hasRole('superadministrator'))) {

           
                $company_id=Auth::user()->company_id;
                $employee_id=Auth::user()->employee_id;
            $companyName=Company::findOrFail($company_id)->name;
            Session::put('companyId', $company_id);
            Session::put('companyName', $companyName);
            Session::put('employeeId',$employee_id);
           // dd(Auth::user()->employee->profile_photo);
           if (Auth::user()->can('view-personal-profile|view-personal-dashboard|reques-leave')) {
               return redirect('manage/employees/'.$employee_id);
           }
            return redirect('manage/companies/'.$company_id);
        }else{

            return redirect('manage/admin');

        }
    }

    public function dashboard() 
    {

        $companies=Company::all();
        $totalCompanies=$companies->count();
        $totalEmployees=totalEmployees();
        $totalDepartments=totalDepartments();
        $totalVacancies=totalVacancies();
        $totalApplications=totalApplications();
        $totalNationalities=totalNationalities();

       

     


        


        // $chart=  Charts::create('line', 'highcharts')
        // ->title('My nice chart')
        // ->elementLabel('My nice label')
        // ->labels(['First', 'Second', 'Third'])
        // ->values([5,10,20])
       
        // ->responsive(false);
  
            // // Setup the chart settings
            // ->title("My Cool Chart")
            // // A dimension of 0 means it will take 100% of the space
            // ->dimensions(0, 400) // Width x Height
            // // This defines a preset of colors already done:)
            // ->template("material")
            // // You could always set them manually
            // // ->colors(['#2196F3', '#F44336', '#FFC107'])
            // // Setup the diferent datasets (this is a multi chart)
            // ->dataset('Element 1', [5,20,100])
            // ->dataset('Element 2', [15,30,80])
            // ->dataset('Element 3', [25,10,40])
            // // Setup what the values mean
            // ->labels(['One', 'Two', 'Three']);

        

       //dd(User::whereRoleIs('superadministrator')->get());
       //dd(Auth::user()->hasRole('superadministrator'));

      // dd($user=User::find(1));
        
     //dd( $logs=Activity::orderBy('id','desc')->take(5)->get());
     $logs=Activity::orderBy('id','desc')->take(5)->get();
     //dd($logs);
        return view('manage.dashboard')->with('logs', $logs)->with('companies',$companies)
        ->with('totalCompanies',$totalCompanies)
        ->with('totalEmployees',$totalEmployees)
        ->with('totalDepartments',$totalDepartments)
        ->with('totalVacancies',$totalVacancies)
        ->with('totalApplications',$totalApplications)
        ->with('totalNationalities',$totalNationalities);
                                        
    }
}
