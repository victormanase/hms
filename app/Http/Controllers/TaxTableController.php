<?php

namespace App\Http\Controllers;

use App\TaxTable;
use Illuminate\Http\Request;
use Session;

class TaxTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxTable=taxTable();
        return view('manage.taxTable.index')->with('taxTables',$taxTable);
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

            'minIncome'=>'required',
            'maxIncome'=>'required',
            'rate'=>'required|numeric|min:0|max:100',
            'rangeCharge'=>'required'
            
        
        ]);

        $taxTable=new TaxTable;

        $taxTable->minIncome=$request->minIncome;
        $taxTable->maxIncome=$request->maxIncome;
        $taxTable->rate=$request->rate;
        $taxTable->rangeCharge=$request->rangeCharge;
        $taxTable->company_id=session('companyId');
        $taxTable->save();
        Session::flash('success', 'Range successfully saved!');
        return redirect()->route('tax-table.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TaxTable  $taxTable
     * @return \Illuminate\Http\Response
     */
    public function show(TaxTable $taxTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaxTable  $taxTable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taxTable=TaxTable::findOrFail($id);

        return view('manage.taxTable.edit')->with('taxTable',$taxTable);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TaxTable  $taxTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([

            'minIncome'=>'required',
            'maxIncome'=>'required',
            'rate'=>'required',
            'rangeCharge'=>'required'
            
        
        ]);

        $taxTable=TaxTable::findOrFail($id);

        $taxTable->minIncome=$request->minIncome;
        $taxTable->maxIncome=$request->maxIncome;
        $taxTable->rate=$request->rate;
        $taxTable->rangeCharge=$request->rangeCharge;
        $taxTable->company_id=session('companyId');
        $taxTable->save();
        Session::flash('success', 'Range successfully saved!');
        return redirect()->route('tax-table.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaxTable  $taxTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaxTable $taxTable)
    {
        //
    }
}
