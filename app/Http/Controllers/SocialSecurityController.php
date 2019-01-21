<?php

namespace App\Http\Controllers;

use App\SocialSecurity;
use Illuminate\Http\Request;
use Session;

class SocialSecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialSecurities=SocialSecurity::where('company_id',session('companyId'))->paginate(15);
        return view('manage.socialSecurity.index')->with('socialSecurities',$socialSecurities);
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
        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            'deduct_from'=> 'required|numeric',
            'employee_share'=> 'required|numeric|min:0|max:100',
            'employer_share'=> 'required|numeric|min:0|max:100'

          ]);

          $socialSecurity = new SocialSecurity;
          $socialSecurity->name=$request->name;
          $socialSecurity->deduct_from=$request->deduct_from;
          $socialSecurity->employee_share=$request->employee_share;
          $socialSecurity->employer_share=$request->employer_share;
          
          
          $socialSecurity->company_id=session('companyId');
          $socialSecurity->save();
         Session::flash('success', 'Social Security successfully saved!');
         return redirect()->route('social-securities.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\socialSecurity  $socialSecurity
     * @return \Illuminate\Http\Response
     */
    public function show(socialSecurity $socialSecurity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\socialSecurity  $socialSecurity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socialSecurity =SocialSecurity::findOrFail($id);
        return view('manage.socialSecurity.edit')->with('socialSecurity',$socialSecurity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\socialSecurity  $socialSecurity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            'deduct_from'=> 'required|numeric',
            'employee_share'=> 'required|numeric',
            'employer_share'=> 'required|numeric'

          ]);

          $socialSecurity =SocialSecurity::findOrFail($id);
          $socialSecurity->name=$request->name;
          $socialSecurity->deduct_from=$request->deduct_from;
          $socialSecurity->employee_share=$request->employee_share;
          $socialSecurity->employer_share=$request->employer_share;
          
          
          $socialSecurity->company_id=session('companyId');
          $socialSecurity->save();
         Session::flash('success', 'Social Security successfully saved!');
         return redirect()->route('social-securities.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\socialSecurity  $socialSecurity
     * @return \Illuminate\Http\Response
     */
    public function destroy(socialSecurity $socialSecurity)
    {
        //
    }
}
