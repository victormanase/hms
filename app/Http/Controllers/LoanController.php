<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;
use Session;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans=Loan::where('company_id',session('companyId'))->paginate(15);;
        $employees=active_employees();
        return view('manage.loans.index')->with('loans',$loans)->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',
            'rate'=>'required',
            'amount'=>'required',
            'employee_id'=>'required'
            
        
        ]);

        $loan=new Loan;

        $loan->name=$request->name;
        $loan->amount=$request->amount;
        $loan->rate=$request->rate;
        $loan->balance=$request->amount;
        $loan->paid=0;
        $loan->employee_id=$request->employee_id;
        $loan->company_id=session('companyId');
        $loan->save();
        Session::flash('success', 'Loan successfully saved!');
        return redirect()->route('loans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $loan=Loan::findOrFail($id);
        $employees=employees();
        return view('manage.loans.edit')->with('loan',$loan)->with('employees',$employees);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([

            'name'=>'required',
            'rate'=>'required',
            'amount'=>'required',
            'employee_id'=>'required'
            
        
        ]);

        $loan=Loan::findOrFail($id);

        $loan->name=$request->name;
        $loan->amount=$request->amount;
        $loan->rate=$request->rate;
        $loan->employee_id=$request->employee_id;
        $loan->company_id=session('companyId');
        $loan->save();
        Session::flash('success', 'Loan successfully saved!');
        return redirect()->route('loans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
