<?php

namespace App\Http\Controllers;

use App\Qualification;
use Illuminate\Http\Request;
use Session;

class QualificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-qualifications', ['only' => ['create']]);
        $this->middleware('permission:update-qualifications',   ['only' => ['edit']]);
        $this->middleware('permission:read-qualifications',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-qualifications',   ['only' =>['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualifications=qualifications();
        return view('manage.qualification.index')->with('qualifications', $qualifications);
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
        
        //dd($request);
        $this->validate($request, [
            'qualification_name' => 'required|min:2|max:255',
            
          ]);

          $qualification = new Qualification;
         $qualification->qualification_name=$request->qualification_name;
         $qualification->company_id=session('companyId');
         $qualification->save();
         Session::flash('success', 'The Qualification was successfully saved!');
         return redirect()->route('qualifications.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function show(Qualification $qualification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qualification=Qualification::findOrFail($id);
        
        return view('manage.qualification.edit')->with('qualification', $qualification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id    )
    {
      

        $this->validate($request, [
            'qualification_name' => 'required|min:2|max:255',
            
          ]);

          $qualification =Qualification::findOrFail($id);
         $qualification->qualification_name=$request->qualification_name;
         $qualification->save();
         Session::flash('success', 'The Qualification was successfully saved!');
         return redirect()->route('qualifications.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qualification $qualification)
    {
        //
    }
}
