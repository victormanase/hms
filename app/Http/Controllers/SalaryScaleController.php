<?php

namespace App\Http\Controllers;

use App\SalaryScale;
use Illuminate\Http\Request;
use Session;

class SalaryScaleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-salaryscales', ['only' => ['create']]);
        $this->middleware('permission:update-salaryscales',   ['only' => ['edit']]);
        $this->middleware('permission:read-salaryscales',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-salaryscales',   ['only' =>['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaryScales=SalaryScale::where('company_id',session('companyId'))->paginate(15);
        return view('manage.salaryScale.index')->with('salaryScales', $salaryScales);
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
        
      
        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            'amount ' => 'numeric',
          ]);

          $salaryScale = new SalaryScale;
         $salaryScale->name=$request->name;
        $salaryScale->amount=$request->amount;
         $salaryScale->company_id=session('companyId');
         $salaryScale->save();
         Session::flash('success', 'The Salary Scale was successfully saved!');
         return redirect()->route('salary-scales.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalaryScale  $salaryScale
     * @return \Illuminate\Http\Response
     */
    public function show(SalaryScale $salaryScale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalaryScale  $salaryScale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salaryScale=SalaryScale::findOrFail($id);
        
        return view('manage.salaryScale.edit')->with('salaryScale', $salaryScale);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalaryScale  $salaryScale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id    )
    {
      

        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            'amount' => 'required|numeric',
            
          ]);

          $salaryScale =SalaryScale::findOrFail($id);
         $salaryScale->name=$request->name;
         $salaryScale->amount=$request->amount;
         $salaryScale->save();
         Session::flash('success', 'The Salary Scale was successfully saved!');
         return redirect()->route('salary-scales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalaryScale  $salaryScale
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalaryScale $salaryScale)
    {
        //
    }
}
