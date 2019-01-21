<?php

namespace App\Http\Controllers;

use App\DraftPayslip;
use App\Employee;
use App\Payslip;
use App\DraftIncome;
use App\DraftDeduction;
use Session;
use Illuminate\Http\Request;

class DraftPayslipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $draftPayslips=DraftPayslip::where('company_id',session('companyId'))->get();
        
        $employee_ids=array();
        $date=0;
        foreach ($draftPayslips as $draftPayslip) {
            $employee_ids[]=$draftPayslip->employee_id;
            $date=$draftPayslip->date;
        }
    
    $employees=Employee::whereIn('id',$employee_ids)->paginate(15);
    return view('manage.draftPayslips.index')->with('employees',$employees)->with('date',$date)->with('draftPayslips',$draftPayslips);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DraftPayslip  $draftPayslip
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DraftPayslip  $draftPayslip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // dd();
        $draftPayslip=DraftPayslip::findOrFail($id);
       // dd($draftPayslip);
        $employee_id=$draftPayslip->employee_id;
        $timestamp=$draftPayslip->date;
        $month=date('m',strtotime($timestamp));
        $year=date('Y',strtotime($timestamp));
       // dd($year);
        // $payslip=Payslip::whereYear('date',$year)->whereMonth('date',$month)->where('employee_id',$employee_id)->first();
        // //$test=$test->id;
        // if($payslip!=null){
        //     return Redirect::back()->withErrors(['The Payslip already Exist']);
        //     //dd('there is value');
        // }
        //$employee=Employee::findOrFail($id);
        //dd($employee->socialSecurities);
        //dd($employee);
        return view('manage.draftPayslips.edit')->with('date',$timestamp)->with('draftPayslip',$draftPayslip);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DraftPayslip  $draftPayslip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $draftPayslip=DraftPayslip::findOrFail($id);
        $income=DraftIncome::where('draft_payslip_id',$draftPayslip->id)->delete();
       // $income->delete();
        for ($i=0; $i<count($request->income_amount); $i++) {

            $new_income=new DraftIncome;
            $new_income->draft_payslip_id=$id;
            $new_income->name=$request->income_name[$i];
            $new_income->amount=$request->income_amount[$i];
        
            $new_income->save();

    }

    $deduction=DraftDeduction::where('draft_payslip_id',$draftPayslip->id)->delete();
        //$deduction->delete();
        for ($i=0; $i<count($request->deduction_amount); $i++) {

            $new_deduction=new DraftDeduction;
            $new_deduction->draft_payslip_id=$id;
            $new_deduction->name=$request->deduction_name[$i];
            $new_deduction->amount=$request->deduction_amount[$i];
            $new_deduction->save();

    }

        Session::flash('success', 'The Employee was successfully updated!');
         return redirect()->route('draft_payslips.index');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DraftPayslip  $draftPayslip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
