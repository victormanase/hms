<?php

namespace App\Http\Controllers;

use App\BankLetter;
use App\Payslip;
use Session;
use App\Bank;
use PDF;
use Illuminate\Http\Request;

class BankLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank_letters=bankLetters();
        return view('manage.bankLetters.index')->with('bank_letters',$bank_letters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.bankLetters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date=$request->date;
        $timestamp=strtotime($date);
        $month=date('m',$timestamp);
        $year=date('Y',$timestamp);

        $payslips=Payslip::whereYear('date',$year)->whereMonth('date',$month)->where('company_id',session('companyId'))->get();
        $banks=Bank::where('company_id',session('companyId'))->where('letter_to_bank','!=',null)->with('employees')->get();
       //dd($banks);
        foreach ($banks as $bank) {
            $observer=0;
            if ($bank->employees->first()!=null) {
                $table_html='<table class="table"><thead><tr><th>Full Name</th><th>Bank Name</th><th>Account Number</th><th>Amount</th></tr></thead><tbody>';
                foreach ($bank->employees as $employee) {
                    foreach ($payslips as $payslip) {
                        if ($employee->id==$payslip->employee_id) {
                          
                            $table_html.='<tr><td>'.$payslip->employee->first_name.' '.$payslip->employee->middle_name.' '.$payslip->employee->last_name. '</td><td>'.$bank->bank_name.'</td><td>'.$payslip->employee->account_number.'</td><td>'.$payslip->net_pay.'</td></tr>';
                        }    
                        }

                       
                }
                $table_html.='</tbody></table>';
                if ($table_html!='<table class="table"><thead><tr><th>Full Name</th><th>Bank Name</th><th>Account Number</th><th>Amount</th></tr></thead><tbody></tbody></table>') {
                    $letter=$bank->letter_to_bank;
                $company_name=$bank->company->name;
                $company_pobox=$bank->company->postal_address;
                $letter=str_replace('[COMPANYNAME]',$company_name,$letter);
                $letter=str_replace('[POBOX]',$company_pobox,$letter);
                $letter=str_replace('[BANKCHARGES]',number_format($bank->bank_charges),$letter);
                $letter=str_replace('[EMPLOYEELIST]',$table_html,$letter);
                $bank_letter=new BankLetter;
                $bank_letter->letter=$letter;
                $bank_letter->company_id=session('companyId');
                $bank_letter->bank_id=$bank->id;
                $bank_letter->save();
                $observer++;
                   
                }
                //dd($table_html);
                
            }
           


                      
    
            
        }

        if ($observer) {
            Session::flash('success', 'Letters Created Successfully!');
            return redirect()->route('bankLetter.index');
        } else {
            Session::flash('warning', 'Letters Not Created Successfully!');
            return redirect()->route('bankLetter.index');
        }
        

        
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BankLetter  $bankLetter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        bankLetterDetails($id);
        
        return view('manage.bankLetters.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BankLetter  $bankLetter
     * @return \Illuminate\Http\Response
     */
    public function edit(BankLetter $bankLetter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BankLetter  $bankLetter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankLetter $bankLetter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BankLetter  $bankLetter
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankLetter $bankLetter)
    {
        //
    }

    public function generatePdf($id)
    { 
       bankLetterDetails($id);
         $pdf = PDF::loadView('manage.bankLetters.pdf');
         return $pdf->download('bankletter'.$id.'.pdf');
     
    }
}
