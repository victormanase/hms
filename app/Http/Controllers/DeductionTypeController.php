<?php

namespace App\Http\Controllers;

use App\DeductionType;
use Illuminate\Http\Request;
use Session;

class DeductionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deductionTypes=DeductionType::where('company_id',session('companyId'))->paginate(15);
        return view('manage.deductionType.index')->with('deductionTypes',$deductionTypes);
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
    
              $deductionType = new deductionType;
             $deductionType->name=$request->name;
            $deductionType->amount=$request->amount;
             $deductionType->company_id=session('companyId');
             $deductionType->save();
             Session::flash('success', 'Deduction Type successfully saved!');
             return redirect()->route('deduction-types.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeductionType  $deductionType
     * @return \Illuminate\Http\Response
     */
    public function show(DeductionType $deductionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DeductionType  $deductionType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deductionType=DeductionType::findOrFail($id);

        return view('manage.deductionType.edit')->with('deductionType', $deductionType);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DeductionType  $deductionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      
        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            'amount' => 'required|min:2|max:255',
            
          ]);

          $deductionType=DeductionType::findOrFail($id);
         $deductionType->name=$request->name;
         $deductionType->amount=$request->amount;
         $deductionType->save();
         Session::flash('success', 'Deduction Type successfully saved!');
         return redirect()->route('deduction-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeductionType  $deductionType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
