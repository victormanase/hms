<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;
use Session;

class BankController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-banks', ['only' => ['create']]);
        $this->middleware('permission:update-banks',   ['only' => ['edit']]);
        $this->middleware('permission:read-banks',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-banks',   ['only' =>['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks=Bank::where('company_id',session('companyId'))->paginate(15);
        return view('manage.bank.index')->with('banks', $banks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.bank.create');
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
            'bank_name' => 'required|min:2|max:255',
            'email'=>'required|email',
            'address'=>'max:255',
            'letter_to_bank'=>'required',
            'bank_charges'=>'numeric'
          ]);

          $bank = new Bank;
         $bank->bank_name=$request->bank_name;
         $bank->email=$request->email;
         $bank->address=$request->address;
         $bank->letter_to_bank=$request->letter_to_bank;
         $bank->bank_charges=$request->bank_charges;
         
         
         $bank->company_id=session('companyId');
         $bank->save();
         Session::flash('success', 'The Bank was successfully saved!');
         return redirect()->route('banks.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank=Bank::findOrFail($id);
        return view('manage.bank.show')->with('bank',$bank);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank=Bank::findOrFail($id);
        
        return view('manage.bank.edit')->with('bank', $bank);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $this->validate($request, [
            'bank_name' => 'required|min:2|max:255',
            'email'=>'required|email',
            'address'=>'max:255',
            'letter_to_bank'=>'required',
            'bank_charges'=>'numeric'
          ]);

          $bank =Bank::findOrFail($id);
      
          $bank->bank_name=$request->bank_name;
          $bank->email=$request->email;
          $bank->address=$request->address;
          $bank->letter_to_bank=$request->letter_to_bank;
          $bank->bank_charges=$request->bank_charges;
          
         $bank->save();
         Session::flash('success', 'Bank Details successfully saved!');
         return redirect()->route('banks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
