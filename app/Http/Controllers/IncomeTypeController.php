<?php

namespace App\Http\Controllers;

use App\IncomeType;
use Illuminate\Http\Request;
use Session;

class IncomeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomeTypes=incomeTypes();
        return view('manage.incomeType.index')->with('incomeTypes',$incomeTypes);
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
            //dd($request);
            $this->validate($request, [
                'name' => 'required|min:2|max:255',
                'amount' => 'required|min:2|max:255',
              ]);
    
              $incomeType = new incomeType;
             $incomeType->name=$request->name;
            $incomeType->amount=$request->amount;
             $incomeType->company_id=session('companyId');
             $incomeType->save();
             Session::flash('success', 'Income Type successfully saved!');
             return redirect()->route('income-types.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IncomeType  $incomeType
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeType $incomeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IncomeType  $incomeType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incomeType=IncomeType::findOrFail($id);

        return view('manage.incomeType.edit')->with('incomeType', $incomeType);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IncomeType  $incomeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      
        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            'amount' => 'required|min:2|max:255',
            
          ]);

          $incomeType=IncomeType::findOrFail($id);
         $incomeType->name=$request->name;
         $incomeType->amount=$request->amount;
         $incomeType->save();
         Session::flash('success', 'Income Type successfully saved!');
         return redirect()->route('income-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IncomeType  $incomeType
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
    }
}
