<?php 

use App\Company;
use App\Employee;
use App\Nationality;
use App\Country;
use App\Region;
use App\District;
use App\Bank;
use App\Department;
use App\Designation;
use App\Vacancy;
use App\Application;
use App\SalaryScale;
use App\WorkStation;
use App\LeaveType;
use App\Qualification;
use App\User;
use App\Permission;
use App\Role;
use App\FieldStudent;
use App\Intern;
use App\Volunteer;
use App\Scholarship;
use App\DeductionType;
use App\IncomeType;
use App\TaxTable;
use App\Loan;
use App\SocialSecurity;
use App\Payslip;
use App\BankLetter;
use App\PaySlipLoan;




function companies()
{
    return  Company::where('company_id',session('companyId'))->get();
}

function bankLetters()
{
    return  BankLetter::where('company_id',session('companyId'))->get();
}



function payslips()
{
    return  Payslip::where('company_id',session('companyId'))->get();
}

function socialSecurities()
{
    return  SocialSecurity::where('company_id',session('companyId'))->get();
}


function loans()
{
    return  Loan::where('company_id',session('companyId'))->get();
}

function scholarships()
{
    return  Scholarship::where('company_id',session('companyId'))->get();
}

function fieldStudents()
{
    return  FieldStudent::where('company_id',session('companyId'))->get();
}

function interns()
{
    return  Intern::where('company_id',session('companyId'))->get();
}

function volunteers()
{
    return  Volunteer::where('company_id',session('companyId'))->get();
}

function allPermissions()
{
    $permissions=Permission::all();
    $data['overviews']=$permissions->where('display_name','overview');
    $data['departments']=$permissions->where('display_name','departments');
    $data['designations']=$permissions->where('display_name','designations');
    $data['salaryscales']=$permissions->where('display_name','salaryscales');
    $data['banks']=$permissions->where('display_name','banks');
    $data['nationalities']=$permissions->where('display_name','nationalities');
    $data['leavetypes']=$permissions->where('display_name','leavetypes');
    $data['qualifications']=$permissions->where('display_name','qualifications');
    $data['workstations']=$permissions->where('display_name','workstations');
    $data['employees']=$permissions->where('display_name','employees');
    $data['leaves']=$permissions->where('display_name','leaves');
    $data['vacancies']=$permissions->where('display_name','vacancies');
    $data['applications']=$permissions->where('display_name','applications');
    $data['fieldstudents']=$permissions->where('display_name','fieldstudents');
    $data['internships']=$permissions->where('display_name','internships');
    $data['volunteers']=$permissions->where('display_name','volunteers');
    $data['scholarships']=$permissions->where('display_name','scholarships');
    $data['roles']=$permissions->where('display_name','roles');
    $data['users']=$permissions->where('display_name','users');
    $data['basic_permissions']=$permissions->where('display_name','basic_permission');

    return $data;
}

function users()
{
    return  User::where('company_id',session('companyId'))->get();
}
function all_companies()
{
    return  Company::all();
}

function employees()
{
    return Employee::where('company_id',session('companyId'))->get();
}
function active_employees()
{
    return Employee::where('company_id',session('companyId'))->where('status',"Active")->get();
}

function roles()
{
    return Role::where('company_id',session('companyId'))->get();
}

function totalEmployees()
{
    return Employee::all()->count();
}

function nationalities()
{
    return Nationality::where('company_id',session('companyId'))->get();
}
function totalNationalities()
{
    return Nationality::all()->count();
}

function countries()
{
    return Country::where('company_id',session('companyId'))->get();
}

function leaveTypes()
{
    return LeaveType::where('company_id',session('companyId'))->get();
}


function regions()
{
    return Region::where('company_id',session('companyId'))->get();
}

function districts()
{
    return District::where('company_id',session('companyId'))->get();
}

function banks()
{
    return Bank::where('company_id',session('companyId'))->get();
}

function departments()
{
    return Department::where('company_id',session('companyId'))->get();
}
function totalDepartments()
{
    return Department::all()->count();
}

function designations()
{
    return Designation::where('company_id',session('companyId'))->get();
}

function vacancies()
{
    return Vacancy::where('company_id',session('companyId'))->get();
}
function totalVacancies()
{
    return Vacancy::all()->count();
}

function applications()
{
    return Application::where('company_id',session('companyId'))->get();
}

function totalApplications()
{
    return Application::all()->count();
}


function salaryScales()
{
    return SalaryScale::where('company_id',session('companyId'))->get();
}

function workStations()
{
    return WorkStation::where('company_id',session('companyId'))->get();
}
function qualifications()
{
    return Qualification::where('company_id',session('companyId'))->get();
}

function incomeTypes()
{
    return IncomeType::where('company_id',session('companyId'))->get();
}
function deductionTypes()
{
    return DeductionType::where('company_id',session('companyId'))->get();
}


function taxTable()
{
    return TaxTable::where('company_id',session('companyId'))->get();
}

function totalIncome ($incomes){
    $total_income=0;
    foreach ($incomes as $income) {
        $total_income=$total_income+$income;
    }
    return $total_income;

}

function payee($amount){
    $tax_table=TaxTable::where('minIncome','<=',$amount)->where('maxIncome','>=',$amount)->where('company_id',session('companyId'))->first();
    //caculate payee
    if ($tax_table->rate==0) {
        $payee=0;
    }else{
        $payee=$tax_table->rangeCharge+(($amount-$tax_table->minIncome)*($tax_table->rate/100));
    }
    return $payee;
}

function totalDeduction ($deducts){
    $total_deduct=0;
    foreach ($deducts as $deduct) {
        $total_deduct=$total_deduct+$deduct;
    }
    return $total_deduct;

}

function payslipDetails($id)
{
    $payslip=Payslip::findOrFail($id);
        $payslip_loans=PaySlipLoan::where('payslip_id',$id)->get();
        
       
        
        $total_balance=0;
        $total_paid=0;
        foreach ($payslip_loans as $payslip_loan) {
            //dd();
            $loan=Loan::findOrFail($payslip_loan->loan_id);

            $total_balance=$total_balance+$loan->balance;
            $total_paid=$total_paid+$loan->paid;

            
        }
       // dd($payslip->loans);
       view()->share('total_balance',$total_balance);
       view()->share('total_paid',$total_paid);
       view()->share('payslip',$payslip);
 
}

function bankLetterDetails($id)
{
    $letter=BankLetter::findOrFail($id);
    view()->share('letter',$letter);
}