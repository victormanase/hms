<?php

namespace App\Http\Controllers;

use App\Pten;
use App\Payslip;
use Session;
use Illuminate\Http\Request;

class PtenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p10s=Pten::where('company_id',session('companyId'))->get();
       // dd($p10s);

       $years =$p10s->unique(function($item){
        return $item['created_at']->year;
    })->map(function($item){
        return $item['created_at']->year;
    })->sort()->toArray();
   // dd($years);

        return view('manage.p10.index')->with('years',$years);

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.p10.create');
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
$year=date('Y',strtotime($date));
       // $payslips=Payslip::whereYear('created_at',$year)->get();
      
        for ($i=1; $i <= 12; $i++) { 
            $p10=new Pten;
            $payees=Payslip::where('company_id',session('companyId'))->whereYear('date',$year)->whereMonth('date',$i)->get();
            $total_monthly_payee=0;
          //  $p10->date=$date;

          if (count($payees)!=0) {
           
            foreach ($payees as $payee) {

                $total_monthly_payee=$total_monthly_payee+$payee->payee;
                $p10->created_at=date('Y-m-d',strtotime($payee->date));
            }
           
          } else {
              $d=mktime(6, 0, 0,$i,1,$year);
             // dd(date("Y-m-d ", $d));
             $p10->created_at=date("Y-m-d", $d);
          }
          
           
                $p10->amount=$total_monthly_payee;
               
                $p10->company_id=session('companyId');
                $p10->save();            
            }

            Session::flash('success', 'P10  successfully created!');
         return redirect()->route('ptens.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pten  $pten
     * @return \Illuminate\Http\Response
     */
    public function show($year)
    {
      
        $p10s=Pten::where('company_id',session('companyId'))->whereYear('created_at',$year)->get();

            return view('manage.p10.show')->with('p10s',$p10s);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pten  $pten
     * @return \Illuminate\Http\Response
     */
    public function edit(Pten $pten)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pten  $pten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pten $pten)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pten  $pten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pten $pten)
    {
        //
    }
}
