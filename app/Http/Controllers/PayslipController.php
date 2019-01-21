<?php

namespace App\Http\Controllers;

use App\Payslip;
use Illuminate\Http\Request;
use App\Employee;
use App\EmployeeSocialSecurity;
use App\SocialSecurity;
use App\TaxTable;
use App\Loan;
use App\PaySlipDeduction;
use Session;
use App\PaySlipIncome;
use App\PaySlipLoan;
use App\PaySlipSsf;
use App\DraftPayslip;
use App\DraftIncome;
use App\DraftDeduction;
use Redirect;
use PDF;


class PayslipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payslips=Payslip::where('company_id',session('companyId'))->paginate(15);
        return view('manage.payslips.index')->with('payslips',$payslips);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
     
        $id=$id;
        $date=date("Y/m/d");
        $timestamp=strtotime($date);
        $month=date('m',$timestamp);
        $year=date('Y',$timestamp);
       // dd($year);
        $payslip=Payslip::whereYear('date',$year)->whereMonth('date',$month)->where('employee_id',$id)->first();
        //$test=$test->id;
        if($payslip!=null){
            return Redirect::back()->withErrors(['The Payslip already Exist']);
            //dd('there is value');
        }
        $employee=Employee::findOrFail($id);
        //dd($employee->socialSecurities);
        return view('manage.payslips.create')->with('employee',$employee)->with('date',$date);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $draftPayslips=DraftPayslip::where('company_id',session('companyId'))->get();
     

        foreach ($draftPayslips as $draftPayslip) {
            $income_amount=array();
            $income_name=array();
            $incomes=DraftIncome::where('draft_payslip_id',$draftPayslip->id)->get();
            foreach ($incomes as $income) {
               $income_amount[]=$income->amount;
               $income_name[]=$income->name;
            }
            $deduction_amount=array();
            $deduction_name=array();
            $deductions=DraftDeduction::where('draft_payslip_id',$draftPayslip->id)->get();
            foreach ($deductions as $deduction) {
               $deduction_amount[]=$deduction->amount;
               $deduction_name[]=$deduction->name;
            }


            $employee_id=$draftPayslip->employee_id;
            $employee=Employee::findOrFail($employee_id);
            $basic_salary=$employee->basic_salary;
            //determine deduct from
            $social_security_id=EmployeeSocialSecurity::where('employee_id',$employee_id)->first()->social_security_id;
            $ssf=SocialSecurity::where('id',$social_security_id)->where('company_id',session('companyId'))->first();
            $deduct_from=$ssf->deduct_from;
            //check if to deduct ssf from basic salary
            if ($deduct_from==0) {
              //deduct ssf from basic salary
                //calculate amount to be deducted
                $ssf_deduct=($ssf->employee_share*$basic_salary)/100;
                //deduct from basic salary
                $residue_basic_salary=$basic_salary-$ssf_deduct;
                //get all incomes and add to residue basic salary
                $total_income=totalIncome($income_amount);
                //add total income to residue income
                $gross_salary=$residue_basic_salary+$total_income;
                //get tax table
                $payee=payee($gross_salary);
                $residue_amount=$gross_salary-$payee;
               // dd($payee);
            } else {
                 //deduct ssf from gross salary
                 $total_income=totalIncome($income_amount);
                 $gross_salary=$basic_salary+$total_income;
                 $ssf_deduct=($ssf->employee_share*$gross_salary)/100;
                 $residue_gross_salary=$gross_salary-$ssf_deduct;
                 $payee=payee($residue_gross_salary);
                //   dd('else'); 
                 $residue_amount=$residue_gross_salary-$payee;            
            }
            //now check loan balance
                // get loan model
           $loans=Loan::where('employee_id',$employee_id)->first();
//dd($loans);
            // check balance
            $residue_after_loan=$residue_amount;
            $cache_loan_paid=array();
            $cache_loan_id=array();
            foreach ($employee->loans as $loan) {
             
                if ($loan->balance!=0) {
                    $loan_deduction=(($loan->rate*$residue_amount)/100);
                    if ($loan_deduction>=$loan->balance) {
                        $residue_after_loan=$residue_after_loan-$loan->balance;
                        //set balance=0
                        $loan->balance=0;
                        //set paid=amount
                        $loan->paid=$loan->amount;
                        //notify the user that loan balance is zero
                        $cache_loan_paid[]=$loan->paid;
                        $cache_loan_id[]=$loan->id;
                        $loan->save();
                       // dd($residue_after_loan);
                       
                    }else{
                        $residue_after_loan=$residue_amount-$loan_deduction;
                        $balance=$loan->balance-$loan_deduction;
                        $paid=$loan->paid+$loan_deduction;
                        $cache_loan_paid[]=$loan_deduction;
                        $cache_loan_id[]=$loan->id;
                        $loan->balance=$balance;
                        $loan->paid=$paid;
                        $loan->save();
                        //notify the user about the balance and paid amount
                    }
                }
            }

           // dd($cache_loan_paid);
       
                $total_deduction=totalDeduction($deduction_amount);
              //  $net_salary=$residue_after_loan-$total_deduction;
                $net_salary=$residue_after_loan-$total_deduction;
              
                $payslip=new Payslip;
                //store basic salary
                //store net pay
                //store payee specific to this payroll
                $payslip->employee_id=$employee_id;
                $payslip->date=$draftPayslip->date;
                $payslip->company_id=session('companyId');
                $payslip->gross_salary=$gross_salary;
                $payslip->net_pay=$net_salary;
                $payslip->payee=$payee;
                $payslip->save();

//dd($payslip);

                //store incomes specific to this payslip
                for ($i=0; $i<count($income_amount); $i++) {
                   
                     $income=new PaySlipIncome;
                     $income->payslip_id=$payslip->id;
                     $income->name=$income_name[$i];
                     $income->amount=$income_amount[$i];
                     $income->company_id=session('companyId');
                     $income->employee_id=$employee_id;

                     //save
                     $income->save();

                }
                //store deductions specific to this payslip
                for ($i=0; $i<count($deduction_amount); $i++) {
              
                    $deduction=new PaySlipDeduction;
                    $deduction->payslip_id=$payslip->id;
                    $deduction->name=$deduction_name[$i];
                    $deduction->amount=$deduction_amount[$i];
                    $deduction->company_id=session('companyId');
                    $deduction->employee_id=$employee_id;

                    //save
                    $deduction->save();

               }

            //    store loan specific to this payroll and this payperiod
           
               for ($i=0; $i<count($cache_loan_id); $i++) {
                
                   $payslipLoan=new PaySlipLoan;
                    $payslipLoan->payslip_id=$payslip->id;
                   // $payslip_loan_deduction=0;
                   
                    $payslipLoan->loan_deduction=$cache_loan_paid[$i];
                    $payslipLoan->loan_id=$cache_loan_id[$i];
                    $payslipLoan->company_id=session('companyId');
                    $payslipLoan->employee_id=$employee_id;
                    $payslipLoan->save();
                  
               }

               
                //store ssf specific to this payroll and for this payperiod
                $payslipSsf=new PaySlipSsf;
                $payslipSsf->social_security_id=$ssf->id;
                $payslipSsf->amount=$ssf_deduct;
                $payslipSsf->payslip_id=$payslip->id;
                $payslipSsf->company_id=session('companyId');
                $payslipSsf->employee_id=$employee_id;
                $payslipSsf->save();

            }
 
            //close pay period
            foreach ($draftPayslips as $draftPayslip) {
                $draftPayslip->delete();
            }
                Session::flash('success', 'Payslips successfully created!');
                return redirect()->route('payslips.index');

                

                
        

        
            


            

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payslip  $payslip
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        payslipDetails($id);
       
    //   $pdf = PDF::loadView('manage.payslips.pdf');

    //   return $pdf->download('manage.payslips.pdf');
      

        return view('manage.payslips.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payslip  $payslip
     * @return \Illuminate\Http\Response
     */
    public function edit(Payslip $payslip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payslip  $payslip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payslip $payslip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payslip  $payslip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payslip $payslip)
    {
        //
    }


    public function getEmployee()
    {
     
       
        $employees=Employee::where('status','Active')->paginate(15);
    return view('manage.payslips.select')->with('employees',$employees);
        
    }

    public function generatePdf($id)
{ 
    //dd();
    payslipDetails($id);
     $pdf = PDF::loadView('manage.payslips.pdf');
     return $pdf->download('payslip'.$id.'.pdf');
 
}

public function openPayPeriod(Request $request)
{
    $this->validate($request, [
        
        'date'  => 'required|date',
       
      ]);

      $employees=active_employees();

      foreach ($employees as $employee) {
          $payslip_draft= New DraftPayslip;
          $payslip_draft->employee_id=$employee->id;
          $payslip_draft->company_id=session('companyId');
          $payslip_draft->date=$request->date;
          $payslip_draft->save();
      }
      Session::flash('success', 'Pay Period created!');
      return redirect()->route('draft_payslips.index');
}

public function closePayPeriod(Request $request)
{
    
}
}


